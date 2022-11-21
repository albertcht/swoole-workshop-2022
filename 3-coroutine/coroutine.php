<?php

use Swoole\Coroutine;
use function Swoole\Coroutine\run;

run(function() {
    go(function () {
        Coroutine::sleep(2);
        echo "Hello world!\n";
    });

    go(function () {
        Coroutine::sleep(1);
        echo "Swoole is awesome!\n";
    });

    echo "PHP is the best!\n";
});

echo "Coroutine to the moon~\n";
