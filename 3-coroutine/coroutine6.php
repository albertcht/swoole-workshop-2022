<?php

use Swoole\Coroutine;
use function Swoole\Coroutine\run;

echo Coroutine::getPcid() . "\n";

run(function() {
    echo Coroutine::getPcid() . "\n";

    go(function () {
        echo Coroutine::getPcid() . "\n";
        go(function () {
            echo Coroutine::getPcid() . "\n";
            go(function () {
                echo Coroutine::getPcid() . "\n";
                go(function () {
                    echo Coroutine::getPcid() . "\n";
                });
                go(function () {
                    echo Coroutine::getPcid() . "\n";
                });
                go(function () {
                    echo Coroutine::getPcid() . "\n";
                });
            });
            echo Coroutine::getPcid() . "\n";
        });
        echo Coroutine::getPcid() . "\n";
    });
});
