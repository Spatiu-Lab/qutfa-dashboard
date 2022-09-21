<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\ProductUnit;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products =  Product::query()
        ->filter()
        ->orderBy('id','DESC')
        ->paginate();

        $status = Product::STATUS;
        return view('admin.products.index',compact('products','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('category_id', null)->get();
        $units = Unit::all();
        $status = Product::STATUS;
        return view('admin.products.create', compact('units', 'categories', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        return DB::transaction(function () use($request) {
             $product = Product::create($request->validated());

            for($i = 0; $i < count(config('translatable.locales')); $i++) {
                $locale = config('translatable.locales')[$i];
                $product->setTranslation('name', $locale, $request->name[$locale]);
            }

            if($request->hasFile('image')){
                $file = $this->store_file([
                    'source'=>$request->image,
                    'validation'=>"image",
                    'path_to_save'=>'/uploads/products/',
                    'type'=>'PRODUCT',
                    'user_id'=> Auth::user()->id,
                    'resize'=>[500,1000],
                    'small_path'=>'small/',
                    'visibility'=>'PUBLIC',
                    'file_system_type'=>env('FILESYSTEM_DRIVER'),
                    /*'watermark'=>true,*/
                    'compress'=>'auto'
                ]);
                $product->update(['image'=>$file['filename']]);
            }

            if($request->has('units')){
                foreach ($request->units as $index => $unit) {
                    $product->units()->create([
                        'unit_id' => $unit,
                        'price' => $request->prices[$index]
                    ]);
                }
            }

            toastr()->success('تم إضافة القسم بنجاح','عملية ناجحة');
            return redirect()->route('admin.products.index');
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $units = Unit::all();
        $status = Product::STATUS;

        return view('admin.products.edit', compact('units', 'categories', 'product', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        return DB::transaction(function () use($request, $product) {
            $product->update($request->validated());

            if($request->hasFile('image')){
                $file = $this->store_file([
                    'source'=>$request->image,
                    'validation'=>"image",
                    'path_to_save'=>'/uploads/products/',
                    'type'=>'PRODUCT',
                    'user_id'=> Auth::user()->id,
                    'resize'=>[500,1000],
                    'small_path'=>'small/',
                    'visibility'=>'PUBLIC',
                    'file_system_type'=>env('FILESYSTEM_DRIVER'),
                    /*'watermark'=>true,*/
                    'compress'=>'auto'
                ]);
                $product->update(['image'=>$file['filename']]);
            }

            if($request->has('units')){

                foreach ($request->units as $index => $unit) {
                    $product_unit = ProductUnit::where('unit_id',$unit)->where('product_id',$product->id)->first();
                    if($product_unit) {
                        $product_unit->update([
                            'unit_id' => $unit,
                            'price' => $request->prices[$index]
                        ]);
                    }
                    else {
                        $product->units()->create([
                            'unit_id' => $unit,
                            'price' => $request->prices[$index]
                        ]);
                    }
                }
            }

            toastr()->success('تم إضافة القسم بنجاح','عملية ناجحة');
            return redirect()->route('admin.products.index');
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        toastr()->success('تم إضافة القسم بنجاح','عملية ناجحة');
        return redirect()->route('admin.products.index');
    }
}
