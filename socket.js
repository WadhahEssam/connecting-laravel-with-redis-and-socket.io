//require modules
let express = require('express');
let app     = express();
let http    = require('http').Server(app);
let Redis   = require('ioredis');
let redis   = new Redis();
let socket  = require('socket.io')(http, {
    rememberTransport: false,
    transports: ['websocket', 'flashsocket', 'polling']
});

//configuration
let port = process.env.PORT || 3000;

//subscribe to some channels on redis
redis.subscribe('test-channel', function(error, count){
    //some logic here
});

//message event listener
redis.on('message', function(channel, message) {
    console.log('Message received: ' + message);

    message = JSON.parse(message);

    // todo : will be the most important line
    socket.emit(message.data.user , message.data );
    // todo : i can delete this code
    // socket.emit(channel + ':' + message.event, message.data);
});

socket.on('connection' , function ( s ) {
  console.log('oh it is new user') ;

    s.on('channel' , function (user) {
        s.emit(user , 'welcome user ' + user ) ;
    }) ;

});


//server listener
http.listen(port, function() {
    console.log('Server running on port: ' + port);
});


app.get('/', function(req, res) {
    res.send('<h1>ماذا تفعل هنا يا فتى :)</h1>');
});