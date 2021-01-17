<?php

namespace LaraToolbox\Responder;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind(\LaraToolbox\Responder\Responder::class, function($app) {
            return new \LaraToolbox\Responder\Responder();
        });
    }
}
