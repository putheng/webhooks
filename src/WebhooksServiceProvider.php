<?php

namespace Putheng\Webhooks;

use Illuminate\Support\ServiceProvider;
use Putheng\Webhooks\Commands\EventMakeCommand;

class WebhooksServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../migrations');
        
        if ($this->app->runningInConsole()) {
            $this->commands([
                EventMakeCommand::class,
            ]);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
