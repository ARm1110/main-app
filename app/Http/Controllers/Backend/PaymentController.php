<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\City;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use function Laravel\Prompts\error;
use function Sodium\randombytes_random16;

class PaymentController extends Controller
{

    public function createPayment(Request $request)
    {

        try {

            // Validate the request data
            $request->validate([
                'amount' => 'required|numeric',
                // Add other validation rules as needed
            ],$this->createPaymentValidationMessages());
            $user=auth()->user();
            $data['carts'] = (Cart::with('products.product')->where('user_id', $user->id)->first());
            if ( $request->amount != $data['carts']->totalPrice()){
                emotify('error', 'خطا در انجام تراکنش!');
                return redirect()->back();
            }

            $data = [
                "merchant_id" => "678B0736-483D-4DC7-9CC9-D0431DC88035",
                "amount" => $request->amount,
               // "callback_url" => "https://sandbox.banktest.ir/zarinpal/api.zarinpal.com/pg/v4/payment/verify.json",
                "callback_url"=>'http://main-app.test:8090/verify-payment',
                "description" => "خرید تست",
                "metadata" => ["email" => "info@email.com", "mobile" => "09121234567"],
                "currency"=> "IRT",
            ];

            $response = Http::post('https://sandbox.banktest.ir/zarinpal/api.zarinpal.com/pg/v4/payment/request.json', $data);

            if ($response->successful()) {
                $result = $response->json();

                if (empty($result['errors']) && $result['data']['code'] == 100) {
                    return redirect('https://sandbox.banktest.ir/zarinpal/www.zarinpal.com/pg/StartPay/' . $result['data']["authority"]);
                } elseif (!empty($result['errors'])) {
                    // Handle errors
                    echo 'Error Code: ' . $result['errors']['code'];
                    echo 'Message: ' . $result['errors']['message'];
                }
            } else {
                // Handle HTTP request failure
                echo 'HTTP Request Failed. Status Code: ' . $response->status();
            }
        }catch (\Exception $e) {
            // Log the message locally OR use a tool like Bugsnag/Flare to log the error
            Log::error('Error from createPayment method',$e->getMessage());
            emotify('error','خطا در انجام عملیات!');
            return view('payments.payment_failed');
            // Either form a friendlier message to display to the user OR redirect them to a failure page
        }
    }

    protected function createPaymentValidationMessages()
    {
        return [
            'amount.required'=> 'فیلد مقدار مورد نیاز است',
            'amount.numeric'=> 'فیلد باید عدد باشد'
        ];
    }



    public function verifyPayment(Request $request)
    {
        $user=auth()->user();
        $data['carts'] = (Cart::with('products.product')->where('user_id', $user->id)->first());

        $payment=[];
        $payment['authority']=$request->input('Authority');
        $payment['merchant_id']='678B0736-483D-4DC7-9CC9-D0431DC88035';
        $payment['verifyUrl']='https://sandbox.banktest.ir/zarinpal/api.zarinpal.com/pg/v4/payment/verify.json';
        $payment['amount']=$data['carts']->totalPrice();
        $payment['currency']="IRT";



        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post($payment['verifyUrl'], [
            'merchant_id' => $payment['merchant_id'],
            'authority' => $payment['authority'],
            'amount' => $payment['amount'],
            "currency"=> "IRT",
        ]);

        if ($response->failed()) {
            // Handle HTTP request failure
            return response()->json(['error' => 'Failed to verify payment'], 500);
        }

        $result = $response->json();

        $payment['metadata']= $response->json();

        if (!empty($result['data']) and  empty($result['errors']) and  $result['data']['code'] == 100 ) {

            $payment['status']='success';
            $this->handlePaymentDatabase($payment,$user);
            $this->handleOrderDatabase($payment,$user);
            $this->removeCart($user);
            emotify('sucsses','تراکنش موفقیت آمیز بود' );
            return redirect()->route('paymentOk');
        }
        elseif(!empty($result['data']) and  empty($result['errors'])  and $result['data']['code'] == 101)
        {
            $payment['status']='pending';

            $this->handlePaymentDatabase($payment,$user);

            $authority=$payment['authority'];

            $status= $payment['status'];
            return redirect()->route('payment_failed',compact('authority','status' ));

        }else {
            $payment['status']='failed';
            $payment['metadata']['data']['ref_id']='no_set';
            $this->handlePaymentDatabase($payment,$user);
            emotify('error','خطا در انجام تراکنش مورد نظر!');
            $authority=$payment['authority'];
            $status= $payment['status'];
            return redirect()->route('payment_failed',compact('authority','status' ));
        }
    }

    public function paymentOk(Request $request)
    {

        $user = auth()->user();
        $data=[];
        $data['user']=$user;
        $data['categories']=Category::all();

        return view('payments.payment_ok',compact('data'));
    }
    public function paymentFailed(Request $request)
    {

        //find payment
        $user = auth()->user();
        $data=[];
        $payment =Payment::where( 'authority','=',$request->authority)
            ->where('user_id', '=' ,$user->id )
            ->where('status', '=',$request->status)
            ->first();
       if (empty($payment)){
           abort(404);
       }

        $data['payment']=$payment;
        $data['user']=$user;
        $data['categories']=Category::all();

        return view('payments.payment_failed',compact('data'));
    }

    protected function removeCart($user)
    {

        $cart = Cart::where('user_id',$user->id)->first();
        if (!empty($cart)) {
            $cart->products()->delete();
            $cart->delete();
        }
    }
    protected function handlePaymentDatabase($paymentData,$user)
    {
        $uniq =random_int(1,9).'_'.Str::random(8);

        while (Payment::where('track_payment', $uniq)->exists()) {
            $uniq = random_int(1,9).'_'.Str::random(8);
        }

        $payment = Payment::create([
            'merchant_id' => $paymentData['merchant_id'],
            'user_id' => $user->id,
            'ref_id' => $paymentData['metadata']['data']['ref_id'],
            'track_payment' => $uniq,
            'authority' => $paymentData['authority'],
            'amount' => $paymentData['amount'],
            'currency' => $paymentData['currency'],
            'metadata' => json_encode($paymentData['metadata']),
            'status' => $paymentData['status'],
        ]);
        return $payment;
    }
    protected function handleOrderDatabase($paymentData, $user)
    {
        $cart = Cart::with('products.product')->where('user_id', $user->id)->first();

        $order = $this->createOrder($user, $paymentData);

        $this->addOrderItems($order, $cart->products);
    }

    protected function createOrder($user, $paymentData)
    {
        $uniq = random_int(1,9).'_'.Str::random(8);

        while (Order::where('order_number', $uniq)->exists()) {
            $uniq =random_int(1,9).'_'.Str::random(8);
        }

        return Order::create([
            'user_id' => $user->id,
            'order_number' => $uniq,
            'total_amount' => $paymentData['amount'],
            'track_id'=>null,
            'status' => 'Unshipped',
            'payment_code'=> $paymentData['metadata']['data']['ref_id']
        ]);
    }

    protected function addOrderItems($order, $products)
    {
        foreach ($products as $cartProduct) {
            $order->products()->create([
                'product_id' => $cartProduct->product_id,
                'quantity' => $cartProduct->quantity,
            ]);
        }
    }


    public function checkout()
    {
        $user = auth()->user();
        $cart= Cart::with('products.product')->where('user_id', $user->id)->first();

        if (empty($cart)){
            emotify('error','سبد خرید شما خالی است');
            return  redirect()->route('cart.index');
        }

        $data=[];
        $data['user']=$user;
        $data['categories']=Category::all();
        $data['carts'] = $cart->totalPrice();
        $data['cities'] = City::all();
        $data['provinces'] = Province::all();
        $data['address'] = Address::all()->where('status','=',1)->where('user_id','=',$user->id)->first();
        return view('payments.checkout',compact('data'));
    }

    public function postCheckout(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'province_id'=> 'required|max:255' ,
            'city_id'=> 'required|max:255' ,
            'full_address' => 'required|max:255',
            'tel' => 'required|max:20',
            'phone'=>'required|max:20|exists:users,phone',
            'email' => 'required|email|exists:users,email',
            'description' => 'max:255',
            'postal_code' => 'required|max:20',


        ], [
            'phone.required'=> 'وارد کردن شماره همراه الزامی است.',
            'phone.max' =>  'طول رشته مورد قبول نست.',
            'phone.exists' =>  'شماره همراه یافت نشد!',
            'email.required'=> 'وارد کردن ایمیل الزامی است.',
            'email.max' =>  'طول رشته مورد قبول نست.',
            'email.exists' =>  'ایمیل یافت نشد!',
            'province_id.required' => 'وارد کردن استان الزامی است.',
            'province_id.max' =>  'طول رشته مورد قبول نست.',
            'city_id.required'=> 'وارد کردن شهر الزامی است.',
            'city_id.max' =>  'طول رشته مورد قبول نست.',
            'first_name.required' => 'وارد کردن نام الزامی است.',
            'first_name.max' => 'طول رشته مورد قبول نست.',
            'last_name.required' => 'وارد کردن نام خانوادگی الزامی است.',
            'last_name.max' => 'طول رشته مورد قبول نست.',
            'full_address.required' => 'وارد کردن آدرس الزامی است.',
            'full_address.max' => 'طول رشته مورد قبول نست.',
            'tel.required' => 'وارد کردن شماره تلفن الزامی است.',
            'tel.max' => 'طول رشته مورد قبول نست.',
            'postal_code.required' => 'وارد کردن کد پستی الزامی است.',
            'postal_code.max' => 'طول رشته مورد قبول نست.',
            'description.max' => 'طول رشته مورد قبول نست.',
            // Add other custom error messages as needed
        ]);
        if ($validator->fails()) {
            $firstError = $validator->errors()->first();
            return redirect()->back()
                ->withErrors($firstError)
                ->withInput();
        }


        $user = auth()->user();
        $address= Address::all()->where('user_id' , '=' , $user->id )->first();

        if ( $address == null){
            $data = [
                'user_id' => $user->id,
                'city_id' => $request->city_id,
                'province_id' => $request->province_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'full_address' => $request->full_address,
                'tel' => $request->tel,
                'postal_code' =>  $request->postal_code,
                'description' => $request->description,
                'status' => '1',
            ];
             Address::create($data);
            emotify( 'success','آدرس شما ذخیره شد');
             return redirect()->back();
        }else{
            $address->update([
                'city_id' => $request->city_id,
                'province_id' => $request->province_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'full_address' => $request->full_address,
                'tel' => $request->tel,
                'postal_code' => $request->postal_code,
                'description' => $request->description,
            ]);
            emotify ( 'success','آدرس شما به‌روز شد');

            return redirect()->back();
        }


    }
    public function getCities($province)
    {
        $cities = City::where('province_id', $province)->get();

        return response()->json($cities);
    }
}
