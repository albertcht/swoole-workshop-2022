<?php

$server = new Swoole\HTTP\Server('0.0.0.0', 9501);

$server->on('request', function ($request, $response) {
    $response->end('Hello Swoole!');
});

echo "Server is starting...\n";
$server->start();
