<?php

namespace Activiti\Client\Model;

abstract class ValueObject
{
    public function __construct(array $properties = [])
    {
        if ($properties !== null) {
            foreach ($properties as $property => $value) {
                $this->$property = $value;
            }
        }
    }

    public function __set($property, $value)
    {
        if (property_exists($this, $property)) {
            throw new \RuntimeException('Property ' . $property . ' is readonly on class ' . get_class($this));
        }

        throw new \RuntimeException('Property ' . $property . ' not found on class ' . get_class($this));
    }

    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }

        throw new \RuntimeException('Property ' . $property . ' not found on class ' . get_class($this));
    }

    public function __isset($property)
    {
        return property_exists($this, $property);
    }

    public function __unset($property)
    {
        $this->__set($property, null);
    }

    public static function __set_state(array $array)
    {
        return new static($array);
    }
}
