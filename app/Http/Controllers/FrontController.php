<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontController extends Controller
{
    protected $nav_categories;

    public function __construct() 
    {
        $this->nav_categories = Category::limit(4)->get();
        View::share('nav_categories', $this->nav_categories);
    }

    
    public function index(Request $request)
    {
        $sliders = Slider::orderByDesc('created_at')->limit(4)->get();
        $categories = Category::limit(4)->get();
        return view('front.index', compact('sliders', 'categories'));
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function contact()
    {
        return view('front.pages.contact');
    }

    public function cart()
    {
        return view('front.pages.cart');
    }

    public function shop($slug)
    {
        $category = Category::where('slug', 'like', '%' . $slug . '%')->firstOrFail();

        $products = ProductUnit::with('product', 'unit')->whereHas('product', function($query) use ($category) {
            return $query->where('category_id', $category->id);
        })
        ->paginate();
        return view('front.pages.shop', compact('category', 'products'));
    }

    public function product($product)
    {
        $product = ProductUnit::with('product', 'unit')->where('id', $product)->first();
        return view('front.pages.product', compact('product'));
    }

    
    public function contact_post(Request $request)
    {
        $request->validate([
            'name'=>"required|min:3|max:190",
            'email'=>"nullable|email",
            "phone"=>"required|numeric",
            "message"=>"required|min:3|max:10000",
        ]);
        if(\MainHelper::recaptcha($request->recaptcha)<0.8)abort(401);
        Contact::create([
            'user_id'=>auth()->check()?auth()->id():NULL,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>/*"قادم من : ".urldecode(url()->previous())."\n\nالرسالة : ".*/$request->message
        ]);

        toastr()->success('تم استلام رسالتك بنجاح وسنتواصل معك في أقرب وقت');
        //\Session::flash('message', __("Your Message Has Been Send Successfully And We Will Contact You Soon !"));
        return redirect()->back();
    }
    public function category(Request $request,Category $category){
        $articles = Article::where(function($q)use($request,$category){
            $q->whereHas('categories',function($q)use($request,$category){
                $q->where('id',$category->id);
            });
        })->orderBy('id','DESC')->paginate();
        return view('front.pages.blog',compact('articles','category'));
    }
    public function article(Request $request,Article $article)
    {
        return view('front.pages.article',compact('article'));
    }
    public function page(Request $request,Page $page)
    {
        return view('front.pages.page',compact('page'));
    }
    public function blog(Request $request)
    {
        $articles = Article::where(function($q)use($request){
            if($request->category_id!=null)
                $q->where('category_id',$request->category_id);
        })->orderBy('id','DESC')->paginate();
        return view('front.pages.blog',compact('articles'));
    }
}

