<?php

namespace Putheng\Webhooks\Models;

use Putheng\Webhooks\Models\Webhook;

trait WebhookTrait
{
	public function webhooks()
    {
        return $this->hasMany(Webhook::class);
    }
}
