<?php

namespace App\Providers;

use App\Models\Ad;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Paginator::useBootstrap();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $randomAd = Ad::inRandomOrder()->first();

        if($randomAd)
        {
            view()->share(['randomAd'=> $randomAd,'adsAva'=> true]);
            return;
        }

        view()->share('adsAva', false);
    }
}
