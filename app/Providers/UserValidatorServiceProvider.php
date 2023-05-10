<?php

namespace App\Providers;

use App\Custom\User\UserValidator;
use Illuminate\Support\ServiceProvider;

class UserValidatorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('UserValidator',function(){
            return new UserValidator();
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
