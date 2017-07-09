<?php

namespace Activiti\Client\Model\User;

class UserInfoList implements \ArrayAccess
{
    /**
     * @var array
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = [];
        foreach ($items as $item) {
            $this->items[] = new UserInfo($item);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return isset($this->items[$offset]) ? $this->items[$offset] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        throw new \Exception('User infos are readonly.');
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        throw new \Exception('User infos are readonly.');
    }
}
