<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\ValueObject;

class Comment extends ValueObject
{
    public $id;
    public $taskUrl;
    public $processInstanceUrl;
    public $message;
    public $author;
    public $time;
    public $taskId;
    public $processInstanceId;
}