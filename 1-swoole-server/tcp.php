<?php

$server = new Swoole\Server('0.0.0.0', 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);

$server->set([
    'worker_num' => 4
]);

$server->on('connect', function ($server, $fd){
    echo "Client {$fd} connected.\n";
});

$server->on('receive', function ($server, $fd, $reactorId, $data) {
    if (trim($data) === 'exit') {
        $server->close($fd);
        return;
    }
    $server->send($fd, "Swoole Response: {$data}");
});

$server->on('close', function ($server, $fd) {
    echo "Client {$fd} closed.\n";
});

echo "Server is starting...\n";
$server->start();
