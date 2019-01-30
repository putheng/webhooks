<?php

namespace Putheng\Webhooks\Listeners;

use Putheng\Webhooks\Events\WebhookEvent;
use Putheng\Webhooks\Jobs\FireWebhook;
use Putheng\Webhooks\Models\Webhook;

class WebhookEventSubscriber
{
    public function subscribe($events)
    {
        $events->listen('*', WebhookEventSubscriber::class . '@handle');
    }

    public function handle($event, $data)
    {
        if (!($event = head($data)) instanceof WebhookEvent) {
            return;
        }
        
        Webhook::get()->each(function ($webhook) use ($event) {
            if (!$webhook->enabledFor($event->getWebhookName())) {
                return;
            }

            dispatch(new FireWebhook($event, $webhook))->onQueue('webhooks');
        });
    }
}