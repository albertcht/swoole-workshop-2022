<?php

use Swoole\Coroutine;
use function Swoole\Coroutine\run;

Coroutine::set([
    'enable_preemptive_scheduler' => true
]);

run(function() {
    go(function () {
        $a = 0;
        while (true) {
            $a++;
        }
    });

    go(function () {
        echo "hello world!\n";
    });
});
