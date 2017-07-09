<?php

namespace Activiti\Client\Model\Task;

class AttachmentList implements \IteratorAggregate
{
    /**
     * @var array
     */
    private $attachments;

    public function __construct(array $attachments = [])
    {
        $this->attachments = [];
        foreach ($attachments as $attachment) {
            $this->attachments[] = new Attachment($attachment);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->attachments);
    }
}
