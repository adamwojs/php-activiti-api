<?php

namespace Activiti\Client\Service;

use Activiti\Client\GatewayInterface;

abstract class AbstractService
{
    /**
     * @var GatewayInterface
     */
    protected $gateway;

    public function __construct(GatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }
}
