<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    public function index()
    {

        $data=[];
        $data['categories']=Category::all();
        $data['products']=Product::all();

        return view('frontend.products', compact('data'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('products.show', compact('product'));
    }
}
