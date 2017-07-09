<?php

namespace Activiti\Client\Model;

class VariableList implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $items;

    public function __construct(array $items = [])
    {
        $this->items = [];
        foreach ($items as $item) {
            $this->items[] = new Variable($item);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }
}
