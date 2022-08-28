<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\CompanyProfile;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('content', CompanyProfile::first());
        view()->share('categories', Category::latest()->get());
    }
}
