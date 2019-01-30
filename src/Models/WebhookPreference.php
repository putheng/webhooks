<?php

namespace Putheng\Webhooks\Models;

use Illuminate\Database\Eloquent\Model;

class WebhookPreference extends Model
{
    protected $fillable = [
    	'webhook_id',
    	'event',
    	'enable'
    ];
}
