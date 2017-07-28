<?php

namespace Activiti\Client\Model\ProcessDefinition;

class ProcessDefinitionUpdate
{
    private $category;

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
    }
}
