<?php
namespace App\Custom\Notification\Facades;

use Illuminate\Support\Facades\Facade;

class UserNotificationFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'UserNotification';
    }

}


?>
