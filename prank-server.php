<?php

function getSocket($address)
{
    $connection = stream_socket_server($address, $errno, $errorMessage);

    if($connection === false)
    {
        throw new UnexpectedValueException("Could not bind to socket: $errorMessage");   
    }

    return $connection;
}

//the socket to send the messages
$sender = getSocket("127.0.0.1:1337");

//client socket, the socket for the person getting pranked
$receiver = getSocket(gethostbyname(gethostname()) . ":1338");

$senderConnection = false;
$receiverConnection = false;

while(true) {

    echo 'waiting for our pranker to connect' . PHP_EOL;

    $senderConnection = stream_socket_accept($sender);
    stream_set_blocking($senderConnection, false);
    echo 'pranker in the house' . PHP_EOL;

    sleep(2);

    echo 'looking for victim' . PHP_EOL;

    $receiverConnection = stream_socket_accept($receiver);
    stream_set_blocking($receiverConnection, false);

    echo 'victim located!' . PHP_EOL;

    if ($receiverConnection && $senderConnection) {

    	while(true){
            stream_copy_to_stream($senderConnection, $receiverConnection);

            sleep(1);
        }
    }

    sleep(2);
}