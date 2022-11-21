<?php

use Swoole\Coroutine;
use function Swoole\Coroutine\run;

run(function() {
    $cid = go(function () {
        $context = Coroutine::getContext();
        $context['a'] = 'b';
        Coroutine::yield();
        var_dump($context);
    });

    go(function () use ($cid) {
        $context = Coroutine::getContext();
        $context['a'] = 'c';
        Coroutine::resume($cid);
        var_dump($context);
    });
});
