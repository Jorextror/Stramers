<?php
namespace App\Custom\Socket;

use Exception;
use Ratchet\ConnectionInterface;
use Ratchet\RFC6455\Messaging\MessageInterface;
use Ratchet\WebSocket\MessageComponentInterface;

class SocketHandler implements MessageComponentInterface
{
    public $clients;
    public $rooms;

    public function onOpen(ConnectionInterface $connection)
    {
        // TODO: Implement onOpen() method.
        $socketId = sprintf('%d.%d', random_int(1, 1000000000), random_int(1, 1000000000));
        $connection->socketId = $socketId;
        $connection->app =  new \stdClass();
        $connection->app->id = 'jpAnWhjrXzs2vUef3HFCDPsUrdEpAS6m';

        $this->clients[$socketId] = $connection;

    }

    public function onClose(ConnectionInterface $connection)
    {
        // TODO: Implement onClose() method.
    }

    public function onError(ConnectionInterface $connection, \Exception $e)
    {
        // TODO: Implement onError() method.
    }

    public function onMessage(ConnectionInterface $connection, MessageInterface $msg)
    {
        // JSON ej:
        // {"to":"srv","data":"message"}

        if (strlen($msg->__toString()) > 0) {
            $data = json_decode($msg->__toString());
            if ($data->to == 'srv') {
                //Mensaje para el server
                $connection->send($data->data);
            }else {
                //Mensaje para otro usuario
                $this->clients[$data->to]->send($data->data);
            }
        }


    }
}
