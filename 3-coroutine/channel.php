<?php

use function Swoole\Coroutine\run;

run(function() {
    $channel = new Swoole\Coroutine\Channel(1);

    go(function () use ($channel) {
        for ($i = 1; $i <= 5; $i++) {
            echo "push {$i}\n";
            $channel->push($i);
            Swoole\Coroutine::sleep(1);
        }
    });

    go(function () use ($channel) {
        while ($result = $channel->pop(1.2)) {
            if (! $result) {
                break;
            }
            echo "pop {$result}\n";
        }
    });
});
