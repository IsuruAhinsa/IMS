<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // share common setting variable with all views
        view()->composer('*', function ($view) {
            $view->with('commonSetting', Setting::getCommonSettings());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
