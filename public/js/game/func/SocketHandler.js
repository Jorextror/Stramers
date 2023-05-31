// import { io } from "https://cdn.socket.io/4.4.1/socket.io.esm.min.js";
export default class SocketHandler {
    constructor(scene){
        this.socket;
    }

    /**
     * Conecta al socket de laravel
     * @param {str} url Url del Socket
     * @param {str} token Token CSRF
     * @param {str} user Nick del usuario
     */
    connect(url,token,user) {
        this.socket = new WebSocket(url);
        this.socket.onopen = () => {
            this.socket.send(JSON.stringify({
                "to":"srv",
                "data":
                {
                    "user":user
                }
            }));
            return true;
        }
        return false;
    }

    main(){
        this.socket.send(JSON.stringify(
            {
                "to":"srv",
                "data":
                    {
                        "msg":"GetMatch"
                    }
            }));
            console.log()
    }


}
