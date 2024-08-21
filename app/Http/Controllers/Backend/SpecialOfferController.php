<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SpecialOffer;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class SpecialOfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('roleCheck:admin')->except('index');
    }

    /**
     * نمایش لیست تخفیف‌ها
     */
    public function index()
    {
        $offers = SpecialOffer::with('product')->get();
        return view('admin.special_offers.index', compact('offers'));
    }

    /**
     * نمایش فرم ایجاد تخفیف جدید
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.special_offers.create', compact('products'));
    }

    /**
     * ذخیره تخفیف جدید
     */
    public function store(Request $request)
    {
        $messages = [
            'product_id.required' => 'فیلد نام محصول الزامی است.',
            'product_id.exists' => 'محصول باید موجود باشد.',
            'discount.required' => 'فیلد تخفیف الزامی است.',
            'discount.numeric' => 'فیلد باید عدد باشد.',
            'start_date.required' => 'فیلد زمان الزامی است.',
            'start_date.date' => 'فیلد زمان باید تابعی از زمان باشد.',
            'end_date.required' => 'فیلد زمان الزامی است.',
            'end_date.date' => 'فیلد زمان باید تابعی از زمان باشد.',
            'end_date.after' => 'فیلد زمان باید بعد از زمان انتخابی اول باشد.',
        ];

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], $messages);

        // بررسی اینکه محصول قبلاً تخفیف دارد یا خیر
        $existingOffer = SpecialOffer::where('product_id', $request->product_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })
            ->first();

        if ($existingOffer) {
            notify()->error('برای این محصول تخفیفی در این بازه زمانی وجود دارد.', 'خطا');
            return redirect()->back()->withInput();
        }

        SpecialOffer::create($request->all());
        notify()->success('تخفیف با موفقیت ایجاد شد.', 'موفقیت آمیز');
        return redirect()->route('admin.special_offers.index');
    }

    /**
     * نمایش فرم ویرایش تخفیف
     */
    public function edit($id)
    {
        $offer = SpecialOffer::findOrFail($id);
        $products = Product::all();
        return view('admin.special_offers.edit', compact('offer', 'products'));
    }

    /**
     * بروزرسانی تخفیف مشخص
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'product_id.required' => 'فیلد نام محصول الزامی است.',
            'product_id.exists' => 'محصول باید موجود باشد.',
            'discount.required' => 'فیلد تخفیف الزامی است.',
            'discount.numeric' => 'فیلد باید عدد باشد.',
            'start_date.required' => 'فیلد زمان الزامی است.',
            'start_date.date' => 'فیلد زمان باید تابعی از زمان باشد.',
            'end_date.required' => 'فیلد زمان الزامی است.',
            'end_date.date' => 'فیلد زمان باید تابعی از زمان باشد.',
            'end_date.after' => 'فیلد زمان باید بعد از زمان انتخابی اول باشد.',
        ];

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'discount' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ], $messages);

        // بررسی اینکه محصول قبلاً تخفیف دارد یا خیر
        $existingOffer = SpecialOffer::where('product_id', $request->product_id)
            ->where('id', '!=', $id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })
            ->first();

        if ($existingOffer) {
            notify()->error('برای این محصول تخفیفی در این بازه زمانی وجود دارد.', 'خطا');
            return redirect()->back()->withInput();
        }

        $offer = SpecialOffer::findOrFail($id);
        $offer->update($request->all());
        notify()->success('تخفیف با موفقیت بروزرسانی شد.', 'موفقیت آمیز');
        return redirect()->route('admin.special_offers.index');
    }

    /**
     * حذف تخفیف مشخص
     */
    public function destroy($id)
    {
        try {
            $offer = SpecialOffer::findOrFail($id);
            $offer->delete();
            notify()->success('تخفیف با موفقیت حذف شد.', 'موفقیت آمیز');
        } catch (\Exception $e) {
            notify()->error('در انجام عملیات خطایی رخ داد: ' . $e->getMessage(), 'خطا');
        }

        return redirect()->route('admin.special_offers.index');
    }
    public function show($id)
    {
        $offer = SpecialOffer::with('product')->findOrFail($id);
        return view('admin.special_offers.show', compact('offer'));
    }
}
