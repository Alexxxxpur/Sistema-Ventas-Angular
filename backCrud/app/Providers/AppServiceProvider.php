<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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
        // Registrar rutas de la API manualmente en el AppServiceProvider
        Route::prefix('api') // Prefijo para las rutas de la API
            ->middleware('api') // Middleware de la API
            ->namespace('App\Http\Controllers') // El espacio de nombres de los controladores
            ->group(function () {
                // Rutas API definidas manualmente aquí
                Route::get('/login/{email}', [UsuarioController::class, 'verificaemail']);
                Route::get('/login/{email}/{password}', [UsuarioController::class, 'verificaclave']);
            });
    }
}

