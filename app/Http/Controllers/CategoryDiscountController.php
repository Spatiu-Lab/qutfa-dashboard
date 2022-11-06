<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryDiscountRequest;
use App\Http\Requests\UpdateCategoryDiscountRequest;
use App\Models\Category;
use App\Models\CategoryDiscount;

class CategoryDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts =  CategoryDiscount::orderBy('id','DESC')->paginate();
        return view('admin.discounts.index',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.discounts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryDiscountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryDiscountRequest $request)
    {
        $discount = CategoryDiscount::create($request->validated() + ['user_id' => auth()->user()->id]);
        toastr()->success('تم إضافة القسم بنجاح','عملية ناجحة');
        return redirect()->route('admin.discounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryDiscount  $categoryDiscount
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryDiscount $categoryDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryDiscount  $categoryDiscount
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryDiscount $discount)
    {
        $categories = Category::all();
        return view('admin.discounts.edit',compact('categories', 'discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryDiscountRequest  $request
     * @param  \App\Models\CategoryDiscount  $categoryDiscount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryDiscountRequest $request, CategoryDiscount $discount)
    {
        $discount->update($request->validated() + ['user_id' => auth()->user()->id]);
        toastr()->success('تم التعديل بنجاح','عملية ناجحة');
        return redirect()->route('admin.discounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryDiscount  $categoryDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryDiscount $discount)
    {
        $discount->delete();
        toastr()->success('تم الحذف بنجاح','عملية ناجحة');
        return redirect()->route('admin.discounts.index');
    }
}
