<?php

$i = 46;

echo "scanning for server, hang on!" . PHP_EOL;

//still need to check for the correct ip range,
//192.168.1.100
//will be
//192.168.22.100 at work

while($i < 255)
{
	$server = "192.168.1." . $i . ":1338";

	$connection = @stream_socket_client($server, $errNo, $errMessage, 1);

	if($connection)
	{
		echo "server found, let the pranks begin" . PHP_EOL;

		while(true)
		{
			$text = fread($connection, 1000);

			if($text)
        	{
        		echo "message received :-)" . PHP_EOL;
	       		exec(sprintf('say "%s"', $text));
        	}
		}
	}

	$i++;

}
