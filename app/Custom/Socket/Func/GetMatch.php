<?php

namespace App\Custom\Socket\Func;

use App\Models\User;
use Exception;

class GetMatch
{
    /**
     * Busca a un usuario que esté en proceso de encontrar partida
     * @param String Id del socket del usuario Master
     * @return Array usuarios master y slave
     */
    public function getMatch($socketId) //OK
    {
        try
        {
            $userSlave = null;
            $userMaster = null;

            $userMaster = User::query()
            ->where('socket_id',$socketId)
            ->where('status',2)
            ->first();

            if ($userMaster != null) {
                $userSlave = User::query()
                ->where('status',2)
                ->where('id','<>',$userMaster->id)
                ->first();
            }

            if ($userSlave != null && $userMaster != null) {
                $userMaster->set_status(3);
                $userSlave->set_status(3);
                return ['user_master'=>$userMaster, 'userSlave'=>$userSlave];
            }

            return false;


        }catch(Exception $e){
            return null;
            // return $e->getMessage();
        }
    }
}


