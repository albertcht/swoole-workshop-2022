<?php

use function Swoole\Coroutine\run;

run(function() {
    go(function () {
        echo "a\n";
        defer(function () {
            echo "~a\n";
        });

        echo "b\n";
        defer(function () {
            echo "~b\n";
        });

        echo "c\n";
    });
});
