<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Get cart items and return the view
        return view('cart.index');
    }

    public function addToCart(Product $product)
    {
        dd('dsd');
        // Logic to add the product to the cart
        // You'll need to implement this logic based on your requirements

        // For example, you can use Laravel's session to store the cart items
        $cart = session()->get('cart', []);

        // Add the product to the cart
        $cart[] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity'=> 1,
            // Add other product details as needed
        ];

        // Update the cart in the session
        session(['cart' => $cart]);
        notify()->success('محصول با موفقیت به سبد خرید اضافه شد.', 'موفقیت آمیز');

        return redirect()->route('cart.index');
    }

    public function update(Request $request, $cartId)
    {
        // Update cart item quantity
    }

    public function remove($cartId)
    {
        // Remove item from the cart
    }
}
