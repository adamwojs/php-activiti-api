<?php

namespace Activiti\Client\Model;

abstract class AbstractQuery extends ValueObject
{
    public $size;
    public $start;
    public $order;
    public $sort;
}