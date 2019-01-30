<?php

namespace Putheng\Webhooks\Models;

use Illuminate\Database\Eloquent\Model;
use Putheng\Webhooks\Models\WebhookPreference;

class Webhook extends Model
{
    public function enabledFor($preference)
    {
        return $this->preferences->event == $preference && 
        		(bool) $this->preferences->enable == true;
    }

    public function preferences()
    {
        return $this->hasOne(WebhookPreference::class);
    }
}
