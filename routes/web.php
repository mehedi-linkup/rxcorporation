<?php

use App\Models\CompanyProfile;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\SpecializeController;
use App\Http\Controllers\Admin\CompanyProfileController;
use App\Http\Controllers\Admin\BarcodeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// optimiZe
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return 'DONE'; //Return anything
});


Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/post/details/{slug}',[HomeController::class,'postDetails'])->name('post.details');
Route::get('/management/show',[HomeController::class,'management'])->name('management.show');
Route::get('/gallery/show',[HomeController::class,'gallery'])->name('gallery.show');
Route::get('/team/show',[HomeController::class,'team'])->name('team.show');
Route::get('/product/show',[HomeController::class,'product'])->name('product.show');
Route::get('/product/category/show/{slug}',[HomeController::class,'productWithCat'])->name('product-cat.show');
Route::get('/product/show/{slug}',[HomeController::class,'productDetails'])->name('product.details');
Route::post('/sms/store',[ContactController::class,'contactStore'])->name('sms.store');

Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login/check',[LoginController::class,'loginCheck'])->name('login.check');
Route::group(['middleware' => ['auth']] , function(){
    Route::get('/login/out',[LoginController::class,'logout'])->name('logout');
    Route::get('/edit/prodile',[LoginController::class,'editProfile'])->name('auth.profile.edit');
    Route::get('/password/change',[LoginController::class,'passwordEdit'])->name('password.change');
    Route::post('/password/update',[LoginController::class,'passwordUpdate'])->name('update.password');
    Route::post('/update/prodile',[LoginController::class,'updateProfile'])->name('auth.profile.update');
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/company/profile',[CompanyProfileController::class,'index'])->name('company.profile');
    Route::post('/company/profle/update/{company}',[CompanyProfileController::class,'update'])->name('company.update');
    Route::get('/about/us/edit',[CompanyProfileController::class,'edit'])->name('about.us.edit');
    Route::post('/about/us/update',[CompanyProfileController::class,'aboutUs'])->name('about.us.update');

    Route::resource('/user',UserController::class)->except('show');
    Route::resource('/slider',SliderController::class)->except('show','create');
    Route::resource('/management',ManagementController::class)->except('show');
    Route::resource('/team',TeamController::class)->except('show');
    Route::resource('/gallery',GalleryController::class)->except('show','create');
    Route::resource('/category',CategoryController::class)->except('show','create');
    Route::resource('/product',ProductController::class)->except('show');
    Route::resource('/post',PostController::class)->except('show');
    Route::resource('/counter',CounterController::class)->except('show','create');
    Route::resource('/specialize',SpecializeController::class)->except('show');
    Route::resource('/partner',PartnerController::class)->except('show');
    Route::resource('/service',ServiceController::class)->except('show');

    Route::get('/barcode', [BarcodeController::class, 'index'])->name('barcode.index');
    Route::post('/barcode', [BarcodeController::class, 'generate'])->name('barcode.store');

   
    Route::get('/contact/list',[ContactController::class,'contactList'])->name('contact.list');
});
