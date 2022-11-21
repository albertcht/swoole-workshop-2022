<?php

require_once('CacheInterface.php');
require_once('CacheTtl.php');

$server = new Swoole\HTTP\Server('0.0.0.0', 9501);

$cache = new SwooleCourse\CacheTtl();

$server->on('request', function ($request, $response) use ($cache) {
    $cache->put(uniqid(), 1, 5);
    $response->end("{$cache->getCount()}\n");
});

echo "Server is starting...\n";
$server->start();
