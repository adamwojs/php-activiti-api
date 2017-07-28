<?php

namespace Activiti\Client\Model\ProcessInstance;

class ProcessInstanceUpdate
{
    private $action;

    public function getAction()
    {
        return $this->action;
    }

    public function setAction($action)
    {
        $this->action = $action;
    }
}
