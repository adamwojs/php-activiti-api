<?php

namespace Activiti\Client\Model;

class BinaryVariable extends Variable
{
    private $file;

    public function getFile()
    {
        return $this->file;
    }

    public function setFile($file)
    {
        $this->file = $file;
    }
}
