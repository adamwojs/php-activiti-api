<?php

namespace Activiti\Client;

use Iterator;

class ObjectSerializer implements ObjectSerializerInterface
{
    const DATE_TIME_FORMAT = 'Y-m-d\TH:i:s\Z';

    /**
     * @inheritdoc
     */
    public function serialize($value)
    {
        if ($value === null) {
            return null;
        }

        if (is_array($value) || $value instanceof Iterator) {
            return $this->serializeArray($value);
        }

        if (is_object($value)) {
            return $this->serializeObject($value);
        }

        return $value;
    }

    /**
     * Serialize collection.
     *
     * @param array|\Iterator $object
     * @return array
     */
    protected function serializeArray($object)
    {
        $result = [];
        foreach ($object as $key => $value) {
            $result[$key] = $this->serialize($value);
        }

        return $result;
    }

    /**
     * Serialize object.
     *
     * @param object $object
     * @return array|string
     */
    protected function serializeObject($object)
    {
        if ($object instanceof \DateTimeInterface) {
            return $this->serializeDateTime($object);
        }

        return $this->serializeValueObject($object);
    }

    /**
     * Serialize POPO.
     *
     * @param object $object
     * @param \ReflectionClass|null $reflection
     * @return array
     */
    protected function serializeValueObject($object, \ReflectionClass $reflection = null)
    {
        $data = [];

        if ($reflection === null) {
            $reflection = new \ReflectionClass($object);
        }

        if (($parent = $reflection->getParentClass()) !== false) {
            $data = $this->serializeValueObject($object, $parent);
        }

        foreach ($reflection->getProperties() as $property) {
            $property->setAccessible(true);
            $data[$property->getName()] = $this->serialize($property->getValue($object));
        }

        return $data;
    }

    /**
     * Serialize \DateTimeInterface object.
     *
     * @param \DateTimeInterface $dateTime
     * @return string
     */
    protected function serializeDateTime(\DateTimeInterface $dateTime)
    {
        return $dateTime->format(self::DATE_TIME_FORMAT);
    }
}
