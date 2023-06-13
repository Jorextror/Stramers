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

    public function getMatch($socket_id)
    {
        $encontrado = false;
        do {

            $usuarios = $this->match->getMatch($socket_id);
            if($usuarios != false)$encontrado = true;
            sleep(2);

        } while ($encontrado);

        return $usuarios;
    }

    public function process($data, $socket_id, $socket)
    {
        try
        {
            if (property_exists($data->data,'nick')) {
                $usuario = $this->user->query()->where('nick',$data->data->user)->first();
                $usuario->set_socket_id($socket_id);
                $usuario->set_status(2);
            }

            if (property_exists($data->data,'msg')) {

                if($data->data->msg == 'GetMatch')return $this->getMatch($socket_id);

            }

        }catch(Exception $e)
        {
            // return $e->getMessage();
            return null;
        }
    }
}


