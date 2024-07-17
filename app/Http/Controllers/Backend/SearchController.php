<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * نمایش فرم جستجو.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('search.index');
    }

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
        $products = Product::search($query)->get();

        return view('admin.search.results', compact('products', 'query'));
    }
}
