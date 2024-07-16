<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\SpecialOffer;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $specialOffers = SpecialOffer::with('product')->where('start_date', '<=', now())->where('end_date', '>=', now())->get();
        $categories= Category::all();
        $brands = Brand::all();
        $data=[
            'specialOffers' => $specialOffers,
            'categories' => $categories,
            "brands"    =>$brands
        ];


        return view('home',compact('data'));
    }
}
