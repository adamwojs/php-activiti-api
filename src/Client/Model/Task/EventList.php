<?php

namespace Activiti\Client\Model\Task;

class EventList implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $events;

    public function __construct(array $events = [])
    {
        $this->events = $events;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->events);
    }
}
