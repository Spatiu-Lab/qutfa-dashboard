<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Category::class, 'category'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories =  Category::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('title','LIKE','%'.$request->q.'%')->orWhere('description','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'slug'=>"required|max:190|unique:categories,slug",
            'title'=>"required",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);


        $category = Category::create([
            'user_id'=>auth()->user()->id,
            "slug"=>$request->slug,
            "title"=> $request->title,
            "description"=>$request->description,
            "category_id"=>$request->category_id,
            "meta_description"=>$request->meta_description,
        ]);

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            $locale = config('translatable.locales')[$i];
            $category->setTranslation('title', $locale, $request->title[$locale]);
        }

        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,  
                'validation'=>"image",
                'path_to_save'=>'/uploads/categories/',
                'type'=>'CATEGORY', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress'=>'auto'
            ]); 
            $category->update(['image'=>$file['filename']]);
        }
        toastr()->success('تم إضافة القسم بنجاح','عملية ناجحة');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {   
        $categories = Category::all();
        return view('admin.categories.edit',compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->merge([
            'slug'=>\MainHelper::slug($request->slug)
        ]);

        $request->validate([
            'slug'=>"required|max:190|unique:categories,slug,".$category->id,
            'title'=>"required|max:190",
            'description'=>"nullable|max:10000",
            'meta_description'=>"nullable|max:10000",
        ]);
        $category->update([
            "slug"=>$request->slug,
            "title"=>$request->title,
            "description"=>$request->description,
            "meta_description"=>$request->meta_description,
        ]);
        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>$request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/categories/',
                'type'=>'CATEGORY', 
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                /*'watermark'=>true,*/
                'compress'=>'auto'
            ]); 
            $category->update(['image'=>$file['filename']]);
        }
        toastr()->success('تم تحديث القسم بنجاح','عملية ناجحة');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        toastr()->success('تم حذف القسم بنجاح','عملية ناجحة');
        return redirect()->route('admin.categories.index');
    }

    /**
     * get sub categories to ajax request
     */
    public function getSubCategories(Category $category)
    {
        $categories = Category::where('category_id', $category->id)->get();
        return response()->json($categories);
    }
}
