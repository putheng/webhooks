Installation
------------

Require this package with composer. It is recommended to only require the package for development.
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

#### The schema
For Laravel 5 migration
```php
php artisan migrate
```
#### The model
Your model should use `Putheng\Webhooks\Models\WebhookTrait` trait , 
and add implements `Putheng\Webhooks\WebhookOwner` to `User` model
```php
use Putheng\Webhooks\WebhookOwner;
use Putheng\Webhooks\Models\WebhookTrait;

class User extends Model implements WebhookOwner{
    use WebhookTrait;
}
```