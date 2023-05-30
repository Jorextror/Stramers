// import { io } from "https://cdn.socket.io/4.4.1/socket.io.esm.min.js";
export default class SocketHandler {
    constructor(scene){
    }

    /**
     * Conecta al socket de laravel
     * @param {str} url Url del Socket
     * @param {str} token Token CSRF
     * @param {str} user Nick del usuario
     */
    connect(url,token,user) {
        scene.socket = new WebSocket(url);
        scene.socket.onopen = () => {
            scene.socket.send(JSON.stringify({"to":"srv","data":{"user":user}}));
            return true;
        }
        return false;
    }

    main(){
        scene.socket.send(JSON.stringify(
            {
                "to":"srv",
                "data":
                    {
                        "msg":"GetMatch"
                    }
            }));
    }


}
