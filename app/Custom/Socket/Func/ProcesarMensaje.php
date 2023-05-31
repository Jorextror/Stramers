<?php

namespace App\Custom\Socket\Func;

use App\Models\User;
use Exception;

class ProcesarMensaje
{
    public $user;
    public $match;
    public function __construct(User $user, GetMatch $match)
    {
        $this->user = $user;
        $this->match = $match;
    }
    /**
     *TODO testear todo
     */
    public function process($data, $socket_id)
    {
        try
        {
            if (property_exists($data->data,'nick')) {
                $usuario = $this->user->query()->where('nick',$data->data->user)->first();
                $usuario->set_socket_id($socket_id);
                $usuario->set_status(2);
            }

            if (property_exists($data->data,'msg')) {
                $encontrado = false;
                do {

                    $usuarios = $this->match->getMatch($socket_id);
                    if(!$usuarios)$encontrado = true;
                    sleep(2);

                } while ($encontrado);

                return $usuarios;
            }

        }catch(Exception $e)
        {
            // return $e->getMessage();
            return null;
        }
    }
}


