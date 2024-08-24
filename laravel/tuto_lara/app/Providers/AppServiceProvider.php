<?php

namespace App\Providers;

use App\Test;
use App\Sample;
use App\Service;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind("service_1",function(){
            return new Test();
        });
        App()->singleton("service_2",function(){
            return new Service;
        });

        //
        $this->app->bind("sample",function(){
            return new Sample("aungnyeinchan");
        });

        $this->app->singleton("sample_2",function(){
            return new Service;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
