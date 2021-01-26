<?php

namespace LaraToolbox\Responder;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider
{
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
