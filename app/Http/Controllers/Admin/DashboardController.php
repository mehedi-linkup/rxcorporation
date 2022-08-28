<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Galllery;
use App\Models\Management;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
       $data['management'] = Management::count();
       $data['product'] = Product::count();
       $data['message'] = Contact::count();
       $data['post'] = Post::count();
       $data['slider'] = Slider::count();
       $data['service'] = Service::count();
       $data['team'] = Team::count();
       $data['gallery'] = Galllery::count();
        return view('admin.dashboard',$data);
    }
}
