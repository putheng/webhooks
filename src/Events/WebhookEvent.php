<?php

namespace Putheng\Webhooks\Events;

interface WebhookEvent
{
    public function webhookPayload();
    public function webhookOwner();
}