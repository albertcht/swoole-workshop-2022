<?php

$server = new Swoole\HTTP\Server('0.0.0.0', 9501);

$count = 0;
$server->on('request', function ($request, $response) use (&$count) {
    $response->end($count++);
});

echo "Server is starting...\n";
$server->start();
