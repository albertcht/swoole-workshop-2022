<?php

use Swoole\Coroutine;
use function Swoole\Coroutine\run;

run(function() {
    $variable = null;

    $cid = go(function () {
        global $variable;
        $variable = 'a';
        Coroutine::yield();
        echo $variable . "\n";
    });

    go(function () use ($cid) {
        global $variable;
        $variable = 'b';
        Coroutine::resume($cid);
        echo $variable . "\n";
    });
});
