<?php

use function Swoole\Coroutine\run;
use Swoole\Runtime;

Runtime::enableCoroutine(false);

run(function() {
    go(function () {
        sleep(2);
        echo "Hello world!\n";
    });

    go(function () {
        sleep(1);
        echo "Swoole is awesome!\n";
    });

    echo "PHP is the best!\n";
});

echo "Coroutine to the moon~\n";
