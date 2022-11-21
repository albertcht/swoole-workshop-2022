<?php

$server = new Swoole\Http\Server('127.0.0.1', 9501);

$atomic = new Swoole\Atomic(1);

$server->on('request', function ($request, $response) use ($atomic) {
    $response->end($atomic->add(1));
});

echo "Server is starting...\n";
$server->start();
