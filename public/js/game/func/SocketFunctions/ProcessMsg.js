export default class ProcessMsg {

    async process(msg, socket)
    {
        console.log(msg)
        if(msg == 'connected')
        {
            socket.send(JSON.stringify(
                {
                    "to":"srv",
                    "data":
                        {
                            "msg":"GetMatch"
                        }
                }));
        }
    }
}
