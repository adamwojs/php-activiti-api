<?php

namespace Activiti\Client;

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
