<?php

namespace App\Providers;

use App\Models\Movie;
use App\Observers\MovieObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 注册模型观察者
        Movie::observe(MovieObserver::class);
    }
}
