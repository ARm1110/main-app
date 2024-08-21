<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{

    /**
     * پردازش جستجو و نمایش نتایج.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        // جستجو با استفاده از Scout

        $data=[];
        $data['categories']=Category::all();
        $data['products']= Product::search($query)->get();
        $data['query']=$request->input('query');
        return view('frontend.products', compact('data'));
    }
}
