<?php

use Swoole\Coroutine;
use function Swoole\Coroutine\run;

run(function() {
    $cid = go(function () {
        echo "co 1 start\n";
        Coroutine::yield();
        echo "co 1 end\n";
    });

    go(function () use ($cid) {
        echo "co 2 start\n";
        Coroutine::sleep(1);
        Coroutine::resume($cid);
        echo "co 2 end\n";
    });
});
