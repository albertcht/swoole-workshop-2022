<?php

$table = new \Swoole\Table(1024, 0.2);

$table->column('id', \Swoole\Table::TYPE_INT, 8);
$table->column('name', \Swoole\Table::TYPE_STRING, 32);

$table->create();

$table->set('a', ['id' => 1, 'name' => 'foo']);
$table->set('b', ['id' => 2, 'name' => 'bar']);

var_dump($table->get('a', 'name'));
var_dump($table->memorySize);
