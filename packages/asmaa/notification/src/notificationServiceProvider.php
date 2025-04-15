<?php

namespace Asmaa\Notification;

use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->publishes([
            __DIR__.'/../config/notification.php' => config_path('notification.php'),
        ], 'config');

        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'notification');

    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/notification.php',
            'notification'
        );

        $this->app->singleton('notification', function () {
            return new Notification();
        });
    }
}
