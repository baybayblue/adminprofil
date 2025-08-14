<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\ProfilSekolah; // <-- Tambahkan ini

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
    public function boot(): void
    {
        // Bagikan data '$profil' ke semua view
        View::composer('*', function ($view) {
            $profil = ProfilSekolah::first();
            $view->with('profil', $profil);
        });
    }
}