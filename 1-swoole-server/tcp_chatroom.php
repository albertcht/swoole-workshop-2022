<?php

$server = new Swoole\Server('0.0.0.0', 9501, SWOOLE_PROCESS, SWOOLE_SOCK_TCP);

$server->set([
    'heartbeat_check_interval' => 5,
    'heartbeat_idle_time' => 10
]);

$server->on('connect', function ($server, $fd) {
    $message = "Client {$fd} connected.\n";
    echo "$message\n";

    broadcast($server, $fd, $message, $fd);
});

$server->on('receive', function ($server, $fd, $reactorId, $data) {
    if (trim($data) === 'exit') {
        $server->close($fd);
        return;
    }

    broadcast($server, $fd, $data);
});

$server->on('close', function ($server, $fd) {
    $message = "Client {$fd} closed.\n";
    echo "$message\n";

    broadcast($server, $fd, $message, $fd);
});

echo "Server is starting...\n";
$server->start();

function broadcast($server, $from, $message, $exclude = null)
{
    $i = 0;
    while (true) {
        if (! $fds = $server->getClientList($i, 100)) {
            break;
        }
        $i = end($fds);

        foreach ($fds as $fd) {
            if ($exclude && $fd === $exclude) {
                continue;
            }
            $server->send($fd, "Message from {$from}: {$message}\n");
        }
    }
}
