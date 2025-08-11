<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\ProfilSekolah;

class AppServiceProvider extends ServiceProvider
{
    
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view) {
            $profil = ProfilSekolah::first();
            $view->with('profil', $profil);
        });
        Paginator::useBootstrap();
    }
}
