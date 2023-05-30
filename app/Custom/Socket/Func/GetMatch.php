<?php

namespace App\Custom\Socket\Func;

use App\Models\User;
use Exception;

class GetMatch
{
    public function getMatch($socketId)
    {
        try
        {
            $userMaster = User::query()
            ->where('socket_id',$socketId)
            ->where('status',2)
            ->first();

            $userSlave = User::query()
            ->where('status',2)
            ->get();
            if (count($userSlave)>0) {
                $userMaster->set_status(3);
                $userSlave->set_status(3);
            }


        }catch(Exception $e){
            return null;
        }
    }
}


