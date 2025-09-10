<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Slider;
use App\Models\Setting;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share the sliders with all views
       View::composer('*', function ($view) {
        $view->with('sliders', Slider::all());

        View::composer('*', function ($view) {
        $setting = Setting::first();
        $view->with('setting', $setting);
    });
    });



        // Alternatively, you can specify a specific view to share the data with
        // For example, if you want to share it only with 'Shared_Layout.Shared' view:
    
    }
}
