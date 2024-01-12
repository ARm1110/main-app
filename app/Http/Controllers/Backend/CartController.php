<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $data=[];
        $data['categories']=Category::all();
        $data['cart']=$this->getCartFromSession();;

        return view('cart.index', ['data' => $data]);
    }

    public function addToCart($id)
    {

        $cart = $this->getCartFromSession();
        $product = Product::findOrFail($id);
        // Add the product to the cart
        $cart[auth()->user()->id] = [
            'id' => $product->id,
            'quantity'=>1
            // Add other product details as needed
        ];
        session(['cart' => json_encode($cart)]);

        notify()->success('محصول با موفقیت به سبد خرید اضافه شد.', 'موفقیت آمیز');

        return redirect()->route('cart.index');
    }

    public function update( $cartId)
    {
        // Update cart item quantity
    }

    public function remove($cartId)
    {
        $cart=$this->getCartFromSession();
        unset($cart[$cartId]);
        session(['cart' => json_encode($cart)]);
        notify()->success('محصول با موفقیت از سبد خرید حذف شد.', 'موفقیت آمیز');

        return redirect()->route('cart.index');
    }

    private function getCartFromSession()
    {
        $cart = Session::get('cart');

        return $cart ? json_decode($cart, true) : [];
    }
}
