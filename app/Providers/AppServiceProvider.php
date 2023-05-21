<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        if (request()->is('admin/*')) {
            config(['session.cookie' => config('session.cookie_admin')]);
        }
        // if (request()->is('company/*')) {
        //     config(['session.cookie' => config('session.cookie_company')]);
        // }
    }
}
