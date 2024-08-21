<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Payment;

class UiPaymentsController extends Controller
{
    public function index()
    {
        $payments= Payment::all();

        return view('admin.payments.index',compact('payments'));
    }
}
