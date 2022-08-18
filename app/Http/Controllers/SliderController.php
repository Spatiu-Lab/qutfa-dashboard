<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::paginate();
        return  view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required | array',
            'image' => 'required | image '
        ]);

        
        $file = $this->store_file([
            'source'=>  $request->image,
            'validation'=>"image",
            'path_to_save'=>'/uploads/sliders/',
            'type'=>'ARTICLE', 
            'user_id'=> Auth::user()->id,
            'resize'=>[500,1000],
            // 'small_path'=>'small/',
            'visibility'=>'PUBLIC',
            'file_system_type'=>env('FILESYSTEM_DRIVER'),
            'compress'=>'auto'
        ]);

        $slider = Slider::create($request->only(['title', 'image']));

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            $locale = config('translatable.locales')[$i];
            $slider->setTranslation('title', $locale, $request->title[$locale]);
        }

        $slider->update([
            'image' => $file['filename']
        ]);

        toastr()->success('تم إضافة المقال بنجاح','عملية ناجحة');

        return redirect()->route('admin.sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return  view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required | array',
            'image' => 'nullable | image '
        ]);


        $slider->update($request->only(['title']));

        for($i = 0; $i < count(config('translatable.locales')); $i++) {
            $locale = config('translatable.locales')[$i];
            $slider->setTranslation('title', $locale, $request->title[$locale]);
        }

        if($request->hasFile('image')){
            $file = $this->store_file([
                'source'=>  $request->image,
                'validation'=>"image",
                'path_to_save'=>'/uploads/sliders/',
                'type'=>'ARTICLE', 
                'user_id'=> Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER'),
                'compress'=>'auto'
            ]);

            $slider->update([
                'image' => $file['filename']
            ]);
        }

        toastr()->success('تم التعديل المقال بنجاح','عملية ناجحة');

        return redirect()->route('admin.sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        toastr()->success('تم حذف المقال بنجاح','عملية ناجحة');
        return redirect()->route('admin.articles.index');
    }
}
