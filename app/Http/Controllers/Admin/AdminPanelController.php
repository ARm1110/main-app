<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        $users=User::all()->count();
        $income=number_format((Payment::all()->sum('amount')), 0);
        $orders = Order::all()->count();
        $data=[
            'users' => $users,
            'income' => $income,
            'orders' => $orders
        ];

        return view('admin.panel',compact('data'));

    }
}
