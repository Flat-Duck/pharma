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
        $ads = Ad::inRandomOrder()->take(3)->get();

        if($ads->count() > 0){
            while ($ads->count() < 3) {
                $ads = $ads->concat($ads);
            }
        
            $randomAds = $ads->take(3);
            view()->share(['randomAds'=> $randomAds,'adsAva'=> true]);
            return;
        }

        view()->share('adsAva', false);
    }
}
