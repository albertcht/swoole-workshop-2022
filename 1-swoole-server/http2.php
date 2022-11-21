<?php

$server = new Swoole\HTTP\Server('0.0.0.0', 9501);

$server->on('start', function ($server) {
    echo "Server started.\n";
});

$server->on('managerStart', function ($server) {
    echo "Manager process started.\n";
});

$server->on('workerStart', function ($server, $workerId) {
    echo "Worker {$workerId} started.\n";
});

$server->on('request', function ($request, $response) {
    $response->end('Hello Swoole!');
});

$server->on('beforeShutdown', function ($server) {
    echo "Terminating...\n";
    sleep(5);
});

echo "Server is starting...\n";
$server->start();

