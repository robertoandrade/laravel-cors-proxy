<?php

namespace Elfo404\LaravelCORSProxy;

use Illuminate\Support\ServiceProvider;

class CORSProxyServiceProvider extends ServiceProvider {
    public function register() {
        $this->mergeConfigFrom(
            __DIR__ . '/config/cors-proxy.php', 'laravel-cors-proxy-config'
        );
    }

    public function boot() {
        require __DIR__ . '/Http/routes.php';
        $this->publishes([
            __DIR__ . '/config' => config_path(),
        ],'config');
    }

}