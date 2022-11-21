<?php

namespace App;

use Illuminate\Contracts\Container\Container;

class Foo
{
    public static $id;

    protected $app;
    protected $timestamp;

    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->time = time();

        if (! static::$id) {
            static::$id = uniqid();
        }
    }

    public function getTimestamp(): int
    {
        return $this->time;
    }

    public function getApp(): Container
    {
        return $this->app;
    }

    public function setApp(Container $app): self
    {
        $this->app = $app;

        return $this;
    }

    public function getId()
    {
        return static::$id;
    }

    public function setId(string $id)
    {
        static::$id = $id;

        return $this;
    }
}