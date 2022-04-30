<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {

    }


    public function boot()
    {
        View::composer('layouts._nav', function($view){
            $categories = Cache::rememberForever('categories', function () {
                    return Category::all();
            });;
            $view->with('categories', $categories);
        });
    }
}
