<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecialOffer;
use App\Models\Product;

class SpecialOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('roleCheck:admin')->except('index');
    }
    public function index()
    {
        $offers = SpecialOffer::with('product')->where('start_date', '<=', now())->where('end_date', '>=', now())->get();
        return view('special_offers.index', compact('offers'));
    }

    public function create()
    {
        $products = Product::all();
        return view('special_offers.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        SpecialOffer::create($request->all());
        return redirect()->route('special_offers.index')->with('success', 'Special offer created successfully.');
    }
}
