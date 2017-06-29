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
        $this->comments = [];
        foreach ($comments as $comment) {
            $this->comments[] = new Comment($comment);
        }
    }

    /**
     * @inheritdoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->comments);
    }
}