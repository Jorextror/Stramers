<?php
namespace App\Custom\Carta\Facades;

use Illuminate\Support\Facades\Facade;

class CartaFacade extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'carta';
    }

}


?>
