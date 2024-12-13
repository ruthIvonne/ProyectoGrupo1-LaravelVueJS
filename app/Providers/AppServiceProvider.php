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

    // Otros registros
    class_alias(\Darryldecode\Cart\Facades\CartFacade::class, 'Cart');


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
