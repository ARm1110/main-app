<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;
use Hekmatinasser\Verta\Verta;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders= Order::all();
        return view('admin.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
//        dd($request->all());
        $messages = [
            'status.required' => 'فیلد وضعیت الزامی است.',
            'status.string' => 'فیلد وضعیت باید یک رشته باشد.',
        ];

        $request->validate([
            'status' => 'required|string|max:255',
        ], $messages);

        $category = Order::findOrFail($id);


        $success= $category->update(['status'=>$request->status]);

        if ($success) {
            notify()->success('دسته بندی با موفقیت بروزرسانی شد.', 'موفقیت آمیز');
            return redirect()->route('admin.order.index');
        } else {
            notify()->error('عملیات با خطلا مواجه گردید!', 'ناموفق');
            return redirect()->route('admin.order.index');
        }


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function printInvoice($id)
    {
        $data = [
            'orders' => Order::where('id', '=', $id)->first(),
        ];

       //return view('invoices.invoice.template', compact('data'));

       $pdf = PDF::loadView('invoices.invoice.template', compact('data'));


       return $pdf->stream("invoice" . $data['orders']->payment_code . ".pdf");
    }
}
