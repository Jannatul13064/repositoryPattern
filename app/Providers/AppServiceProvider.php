<?php

namespace App\Providers;


use App\Repository\InterFaceProductRepository;
use App\Repository\ProductRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InterFaceProductRepository::class , ProductRepository::class);
    }


    public function boot(): void
    {
        //
    }
}