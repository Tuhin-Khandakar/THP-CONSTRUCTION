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
    public function boot(): void
    {
        if (config('app.env') !== 'testing' && \Schema::hasTable('settings')) {
            \View::share('settings', \App\Models\Setting::all()->pluck('value', 'key'));
        }
    }
}
