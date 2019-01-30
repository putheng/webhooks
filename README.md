Installation
------------

Require this package with composer.
```
composer require putheng/webhooks
```

Laravel 5.5 uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

### Setting up from scratch

#### Laravel 5.5+:
If you don't use auto-discovery, add the ServiceProvider to the providers array in `config/app.php`
```php
Putheng\Webhooks\WebhooksServiceProvider::class,
```

#### Schema
For Laravel 5 migration
`php artisan migrate`

#### Model

#### Event
Add `WebhookEventSubscriber` to `protected $subscribe` property on `EventServiceProvider`.
We can create if `protected $subscribe` property doesn't exists
```php
protected $subscribe = [
    \Putheng\Webhooks\Listeners\WebhookEventSubscriber::class
];
```

Create an event
`php artisan event:webhook EventName`

Update`public $webhookName` property on `EventName` that we just generated.
this name should match `event` column on `webhook_preferences` table.
by default this use snake_case of reflection class. example: `EventName` will be `event_name` by default 
```php
public $webhookName = 'name';
```

#### Queue
by default webhook event queue will be set onQueue to `webhooks`.
if we set queue connection to database, artisan command should be
`php artisan queue:listen --queue=webhooks`

