<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Galllery;
use App\Models\Management;
use App\Models\Post;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Specialization;
use App\Models\Team;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data['management'] = Management::take(4)->get();
        $data['post'] = Post::take(3)->get();
        $data['slider'] = Slider::all();
        $data['counter'] = Counter::all();
        $data['special_first'] = Specialization::take(1)->first();
        $data['specialize']= Specialization::skip(1)->take(3)->get();
        $data['gallery'] = Galllery::all();
        
        return view('website.index',$data);
    }
    public function contact(){
        return view('website.contact');
    }
    public function about(){
        return view('website.about');
    }
    public function postDetails($slug){
        $post = Post::where('slug',$slug)->first();
        $posts = Post::all();
        return view('website.post_details',compact('post','posts'));
    }
    public function management(){
        $management = Management::all();
        return view('website.management',compact('management'));
    }
    public function gallery(){
        $gallery = Galllery::all();
        return view('website.gallery',compact('gallery'));
    }
    public function team(){
        $team = Team::all();
        return view('website.team',compact('team'));
    }
    public function product(){
        $product = Product::latest()->get();
        return view('website.product',compact('product'));
    }
    public function productDetails($slug){
        $item = Product::where('slug',$slug)->first();
        return view('website.product_details',compact('item'));
    }
}
