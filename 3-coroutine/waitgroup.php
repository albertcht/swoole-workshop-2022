<?php

use Swoole\Coroutine;
use function Swoole\Coroutine\run;

run(function() {
    go(function () {
        $waitgroup = new Swoole\Coroutine\WaitGroup;
        $waitgroup->add(2);

        $result = [];

        go(function () use ($waitgroup, &$result) {
            Coroutine::sleep(2);
            $result[] = 'hello';
            $waitgroup->done();
        });

        go(function () use ($waitgroup, &$result) {
            Coroutine::sleep(1);
            $result[] = 'swoole';
            $waitgroup->done();
        });

        $waitgroup->wait();

        var_dump($result);
    });
});
