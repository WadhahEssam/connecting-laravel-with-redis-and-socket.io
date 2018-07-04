<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    /* todo : don't forget this */
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Event Broadcasting Example</title>
    <style>
        body{
            padding: 20px;
        }
    </style>
</head>
<body>
<h1>Event fired</h1>
<p id="power"></p>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.slim.js"></script>

<script>
    // todo : focus on where to connect and the port number
    var socket = io('localhost:3000', {'transports': ['websocket', 'polling']});

    socket.on('test-channel:App\\Events\\TestEvent', function(message) {
        console.log('hello') ;
        $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
    });


    socket.on('connect', function( ) {
        // Connected, let's sign-up for to receive messages for this room
        $('#power').html( $('#power').html() + 'you are connected');
    });

    // 12345 will be a variable that will change for every user ( long random number )
    socket.on('12345' , function ( data ) {
        console.log(data) ;
        $('#power').html( $('#power').html() + '<br>' + data.data);
    });


</script>
</body>
</html>