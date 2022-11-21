<?php

namespace App\Http\Controllers;

use App\Foo;

class DemoController extends Controller
{
    protected $foo;

    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    public function foo()
    {
        return [
            'id' => $this->foo->getId(),
            'object_id' => spl_object_id($this->foo),
            'timestamp' => $this->foo->getTimestamp(),
            'user' => $this->foo->getUser(),
        ];
    }

    public function getTrace()
    {
        return [
            'included_files' => get_included_files(),
            'debug_backtrace' => debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS),
        ];
    }
}
