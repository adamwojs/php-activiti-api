<?php

namespace Activiti\Client\Model;

abstract class AbstractList extends ValueObject
{
    public $data;
    public $total;
    public $start;
    public $sort;
    public $order;
    public $size;
}
