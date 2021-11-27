<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use App\Models\Tag;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\View;
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
        View::share('categories', Category::all());
        View::share('tags', Tag::all());
        View::share('setting', Setting::findOrFail(1)->first());
    }
}
