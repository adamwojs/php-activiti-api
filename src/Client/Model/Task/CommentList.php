<?php

namespace Activiti\Client\Model\Task;

class CommentList implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $comments;

    public function __construct(array $comments = [])
    {
        $this->comments = $comments;
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->comments);
    }
}
