<?php
namespace App\Custom\User\Facades;

use Illuminate\Support\Facades\Facade;

class UserValidatorFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'UserValidator';
    }

}


?>
