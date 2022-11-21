<?php

use Swoole\Coroutine;
use function Swoole\Coroutine\run;

run(function() {
    $amount = 100;
    $lock = new Swoole\Lock;

    echo "remaining amount: {$amount}\n";

    go(function () use (&$amount, $lock) {
        $lock->lock();
        Coroutine::sleep(1);
        $amount -= 10;
        $lock->unlock();
        echo "remaining amount: {$amount}\n";
    });

    go(function () use (&$amount, $lock) {
        $lock->lock();
        Coroutine::sleep(1);
        $amount -= 20;
        $lock->unlock();
        echo "remaining amount: {$amount}\n";
    });
});
