<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Http\Middleware\CheckAdminRole; // Asegúrate de importar tu middleware

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define las rutas para la aplicación.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Registrar el middleware personalizado 'checkadmin'
        Route::aliasMiddleware('checkadmin', CheckAdminRole::class);
    }

    /**
     * Define las rutas para la aplicación.
     *
     * @return void
     */
    // public function map()
    // {
    //     $this->mapWebRoutes();
    //     $this->mapApiRoutes();
    // }

    /**
     * Mapea las rutas de la web.
     *
     * @return void
     */
    // protected function mapWebRoutes()
    // {
    //     Route::middleware('web')
    //          ->group(base_path('routes/web.php'));
    // }

    /**
     * Mapea las rutas de la API.
     *
     * @return void
     */
    // protected function mapApiRoutes()
    // {
    //     Route::middleware('api')
    //          ->prefix('api')
    //          ->group(base_path('routes/api.php'));
    // }
}