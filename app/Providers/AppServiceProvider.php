<?php

namespace App\Providers;

use App\Models\AppProfile;
use Illuminate\Contracts\Pagination\Paginator;
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
        if (! app()->runningInConsole()) {
            $app_info = AppProfile::where('id',1)->first();
            
            view()->share('app_info', $app_info);

            // view()->composer('*', function ($view) {
            //     $view->with('current_locale', app()->getLocale());
            //     $view->with('available_locales', config('app.available_locales'));
            // });
        }
    
    }
}
