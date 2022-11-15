<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \App\Custom\Carta\Carta;

class CartaServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('carta',function(){
            return new Carta();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
