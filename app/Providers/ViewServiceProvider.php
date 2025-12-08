<?php

namespace App\Providers;

use App\Settings\ContactSettings;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
    public function boot(ContactSettings $contactSettings): void
    {
        view()->share('contactSettings', $contactSettings);
    }
}
