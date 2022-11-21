<?php

use function Swoole\Coroutine\run;

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
