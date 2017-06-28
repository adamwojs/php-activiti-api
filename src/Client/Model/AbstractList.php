<?php

namespace Activiti\Client\Model;

abstract class AbstractList implements \IteratorAggregate
{
    public $data;
    public $total;
    public $start;
    public $size;
    public $sort;
    public $order;

    public function __construct(array $response = [])
    {
        $this->data = [];

        $this->total = $response['total'];
        $this->start = $response['start'];
        $this->size = $response['size'];

        $this->order = $response['order'];
        $this->sort = $response['sort'];
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->data);
    }
}
