<?php

namespace Activiti\Client\Service;

interface ObjectSerializerInterface
{
    /**
     * Serialize value.
     *
     * @param mixed $value
     * @return mixed
     */
    public function serialize($value);
}
