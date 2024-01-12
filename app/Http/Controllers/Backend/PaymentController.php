<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class PaymentController extends Controller
{
    /**
     * Create a new payment.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function createPayment(Request $request)
    {
        // Validate the request data
        $request->validate([
            'amount' => 'required|numeric',
            // Add other validation rules as needed
        ]);
        dd('start ');
        $response = zarinpal()
            ->amount($request->amount)
            ->request()
            ->description('توضیحات تراکنش')
            ->callbackUrl('http://main-app.test:8090/verification')
            ->mobile('09120199514') // شماره موبایل مشتری - اختیاری
            ->email('info@faridaghili.ir') // آدرس ایمیل مشتری - اختیاری
            ->send();

        if (! $response->success()) {
            // مشکلی پیش اومده که می‌تونین علتش رو به مشتری نمایش بدین
            notify()->error('مشکلی پیش اومده!','خطا');
            return $response->error()->message();
        }


        // Create a new payment record
        $payment = Payment::create([
            'user_id' => auth()->id(), // Assuming you're using Laravel's authentication
            'amount' => $request->amount,
            'merchant_id' => env('ZARINPAL_MERCHANT_ID'), // Replace with your merchant ID
            'callback_url' => 'http://main-app.test:8090/verification', // Replace with your callback URL
            'authority'=> $response->authority() ,
            'description' => 'خرید تست', // Replace with your description
            'metadata' => ['email' => 'info@email.com', 'mobile' => '09121234567'], // Replace with your metadata
        ]);

        // Redirect to ZarinPal payment gateway
        // Adjust the authority and redirection URL based on your payment provider
        return redirect()->away('https://sandbox.banktest.ir/zarinpal/www.zarinpal.com/pg/StartPay/' . $payment->authority);
    }


    /**
     * Verify the payment.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function verifyPayment(Request $request)
    {
        // Handle the verification process
        // You need to implement the logic for verifying the payment status
        // Update the payment status based on the verification result

        return view('payment.verify'); // Replace with your view
    }
}
