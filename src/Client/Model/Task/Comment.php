<?php

namespace Activiti\Client\Model\Task;

use Activiti\Client\Model\ValueObject;

class Comment extends ValueObject
{
    public $id;
    public $author;
    public $message;
    public $time;
    public $taskId;
    public $taskUrl;
    public $processInstanceId;
    public $processInstanceUrl;
}
