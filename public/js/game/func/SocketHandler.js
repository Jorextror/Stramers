export default class SocketHandler {
    constructor(scene){
        scene.socket;
    }
    /**
     * Define el socket a utilizar
     * @param {WebSocket} value
     */
    setSocket(value){
        this.socket = value;
    }

    /**
     * Conecta al socket de laravel
     * @param {str} url Url del Socket
     * @param {str} token Token CSRF
     * @param {str} user Nick del usuario
     */
    connect(url,token,user) {
        var socket = new WebSocket(url);
            socket.onopen = () => {
                socket.send(JSON.stringify({
                    "to":"srv",
                    "data":
                    {
                        "user":user
                    }
                })
            );
        }
        return socket;

    }
    async connection (socket, timeout = 10000) {
        const isOpened = () => (socket.readyState === WebSocket.OPEN)

        if (socket.readyState !== WebSocket.CONNECTING) {
          return isOpened()
        }
        else {
          const intrasleep = 100
          const ttl = timeout / intrasleep // time to loop
          let loop = 0
          while (socket.readyState === WebSocket.CONNECTING && loop < ttl) {
            await new Promise(resolve => setTimeout(resolve, intrasleep))
            loop++
          }
          return isOpened()
        }
      }

    async main(socket){
        const opened = await this.connection(socket)
        if (opened) {
            socket.send(JSON.stringify(
                {
                    "to":"srv",
                    "data":
                        {
                            "msg":"GetMatch"
                        }
                }));
            socket.onmessage = (event) => {
                console.log(event.data)
            }
        }
        else {
            console.log("the socket is closed OR couldn't have the socket in time, program crashed");
            return
        }

    }


}
