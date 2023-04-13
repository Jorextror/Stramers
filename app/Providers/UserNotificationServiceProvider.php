<?php

namespace App\Providers;

use App\Custom\Notification\UserNotification;
use Illuminate\Support\ServiceProvider;

class UserNotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('UserNotification',function(){
            return new UserNotification();
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
