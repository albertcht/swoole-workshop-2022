<?php

use function Swoole\Coroutine\run;
use Swoole\Coroutine\Http\Client;

run(function() {
    go(function () {
        $client = new Client('ifconfig.co', 80);
        $client->get('/ip');

        echo $client->body;
    });
});

echo "Hello Swoole!\n";
