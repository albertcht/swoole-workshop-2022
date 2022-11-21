<?php

use function Swoole\Coroutine\run;
use Swoole\Runtime;

Runtime::enableCoroutine(true);

run(function() {
    go(function () {
        echo file_get_contents('http://ifconfig.co/ip');
    });

    echo "Hello Swoole!\n";
});
