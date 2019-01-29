<?php

namespace Putheng\Webhooks;

use ReflectionClass;

trait InteractsWithWebhooks
{
    public function getWebhookName()
    {
        return snake_case((new ReflectionClass($this))->getShortName());
    }
}