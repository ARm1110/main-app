<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $data=[];
        $data['categories']=Category::all();
        $data['carts'] = Cart::with('products.product')->where('user_id', $user->id)->first();
        return view('cart.index', compact('data'));
    }

    public function addToCart(Product $product)
    {
        // Assuming you have a logged-in user, get the user ID
        $userId = auth()->id();
        // Find or create a cart for the user
        $cart = Cart::firstOrCreate(['user_id' => $userId]);
        // Check if the product is already in the cart
        $existingProduct = $cart->products()->where('product_id', $product->id)->first();
        if ($existingProduct) {
            // If the product is already in the cart, increase the quantity
            $existingProduct->update(['quantity' => $existingProduct->quantity + 1]);
        } else {
            // If the product is not in the cart, add it with quantity 1
            $cartProduct = new CartProduct(['product_id' => $product->id, 'quantity' => 1]);
            $cart->products()->save($cartProduct);
        }

        notify()->success('محصول با موفقیت به سبد خرید اضافه شد.', 'موفقیت آمیز');

        return redirect()->route('cart.index');
    }

    public function updateQuantity(Request $request, CartProduct $cartProduct)
    {
        $request->validate([
            'count' => 'required|numeric|min:1', // Add any validation rules you need
        ], $this->updateQuantityValidationMessages());

        $cartProduct->update([
            'quantity' => $request->input('count'),
        ]);
        notify()->success('مقدار با موفقیت به روز شد.', 'موفقیت آمیز');
        return redirect()->route('cart.index');
    }

    protected function updateQuantityValidationMessages()
    {
        return [
            'count.required' =>'مقادیر مورد نیاز هست',
            'count.numeric'=>'مقادیر باید عدد باشد',
            'count.min'=>'کمترین مقدار( 1 ) میباشد',
        ];
    }
    public function removeProduct(CartProduct $cartProduct)
    {
        $cartProduct->delete();
        notify()->success('محصول با موفقیت از سبد خرید حذف شد.', 'موفقیت آمیز');
        return redirect()->route('cart.index');
    }

}
