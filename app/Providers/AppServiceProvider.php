<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;   // ✅ Thêm dòng này
use App\Models\Slider;                 // ✅ Thêm dòng này

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
        // Truyền biến $slider vào view layout.blade.php
        View::composer('layout', function ($view) {
            $view->with('slider', Slider::all());
        });
    }
}
