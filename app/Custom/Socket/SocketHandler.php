<?php
namespace App\Custom\Socket;

use App\Models\User;
use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;
use App\Custom\Socket\Func\GetMatch;
use App\Custom\Socket\Func\ProcesarMensaje;

class SocketHandler implements MessageComponentInterface
{
    public $clients;
    public $rooms;
    public $user;
    private $process;
    public function __construct(User $user, ProcesarMensaje $process)
    {
        $this->user = $user;
        $this->process = $process;
    }

    public function onOpen(ConnectionInterface $connection)
    {
        // TODO: Implement onOpen() method.
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));
        $connection->socketId = $socketId;
        $connection->app =  new \stdClass();
        $connection->app->id = 'jpAnWhjrXzs2vUef3HFCDPsUrdEpAS6m';

        $this->clients[$socketId] = $connection;
        $connection->send('connected');

    }

    public function onClose(ConnectionInterface $connection)
    {
        // TODO: Implement onClose() method.
        unset($this->clients[$connection->socketId]);
        $usuario = $this->user->query()->where('socket_id',$connection->socketId)->first();
        // $usuario->set_socket_id(null);
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        // TODO: Implement onError() method.
        unset($this->clients[$connection->socketId]);
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        // JSON ej:
        // {"to":"srv","data":"message"}

        if (strlen($msg->__toString()) > 0) {
            $data = json_decode($msg->__toString());
            $returned_data = $this->process->process($data,$connection->socketId,$connection);
            if ($returned_data['status'] == 200) {

            }

        }
    }
}
