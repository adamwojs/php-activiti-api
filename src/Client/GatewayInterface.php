<?php

namespace Activiti\Client;

interface GatewayInterface
{
    public function execute($name, array $args = []);
}
