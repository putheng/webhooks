<?php

namespace Putheng\Webhooks\Models;

use Illuminate\Database\Eloquent\Model;
use Putheng\Webhooks\Models\WebhookPreference;

class Webhook extends Model
{
    public function enabledFor($preference)
    {
        return (bool) optional($this->preferences)->{$preference} === true;
    }

    public function preferences()
    {
        return $this->hasOne(WebhookPreference::class);
    }
}
