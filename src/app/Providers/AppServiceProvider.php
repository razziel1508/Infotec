<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
    // Forzar Laravel a usar la URL pública de Codespaces
    URL::forceRootUrl(config('app.url'));

    // Si tu URL usa https (lo más probable), forza el esquema https
    if (str_starts_with(config('app.url'), 'https://')) {
        URL::forceScheme('https');
    }
}
}
