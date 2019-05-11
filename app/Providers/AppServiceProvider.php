<?php

namespace App\Providers;

use Illuminate\Http\Request;
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
        \Log::info("===boot services Providers====");
        // if (env('APP_ENV') == 'local' || env('APP_ENV') == 'development'){
            \DB::listen(function ($query) {
            \Log::info("--- start query ---");
            \Log::info("query : " . $query->sql);
            \Log::info("bindings : " . json_encode($query->bindings));
            \Log::info("time : " . $query->time);
            \Log::info("--- end query ---");
            });
        // }
    }
}
