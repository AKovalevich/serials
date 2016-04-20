<?php

namespace App\Providers;

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
        if ($this->app->environment() == 'local') {
            $this->app->register('Wn\Generators\CommandsServiceProvider');
        }
    }

    public function boot(){
        $this->app['api.auth']->extend('jwt', function ($app) {
            return new \Dingo\Api\Auth\Provider\JWT($app['Tymon\JWTAuth\JWTAuth']);
        });
    }
}
