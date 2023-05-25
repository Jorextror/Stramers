export default class SocketHandler {
    constructor(scene){
    // console.log(url)
        this.socket;
    }

    connect(url,token) {
        this.socket = io(url, {
            reconnectionDelayMax: 10000,
            auth: {
              token: "token"
            }
        });
        this.socket.on('connection', (socket)=>{
            console.log('connected: '+socket)
        });
    }
}
