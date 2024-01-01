<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data=[];
        $data['categories']=Category::all();

        return view('home',compact('data'));
    }
}
