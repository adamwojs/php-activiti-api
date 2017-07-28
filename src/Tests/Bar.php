<?php

namespace Activiti\Tests;

class Bar extends Foo
{
    private $c;

    public function __construct($a = null, $b = null, $c = null)
    {
        parent::__construct($a, $b);
        $this->c = $c;
    }
}
