<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $serviceBindings = [
            \App\Services\Interfaces\UserServiceInterface::class => \App\Services\UserService::class,
            \App\Repositories\Interfaces\UserRepositoryInterface::class => \App\Repositories\UserRepository::class,
            \App\Repositories\Interfaces\ProvinceRepositoryInterface::class => \App\Repositories\ProvinceRepository::class,
            \App\Repositories\Interfaces\DistrictRepositoryInterface::class => \App\Repositories\DistrictRepository::class,
        ];

        foreach ($serviceBindings as $key => $val) {
            $this->app->bind($key, $val);
        }
    }
    
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Schema::defaultStringLength(191); 
    }
}
