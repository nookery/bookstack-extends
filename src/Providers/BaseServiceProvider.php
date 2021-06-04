<?php

namespace Nookery\BootstackExtends\Providers;

use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        // 加载路由
        $this->loadRoutesFrom(base_path('extends/routes.php'));

        // 注册视图
        $this->loadViewsFrom(base_path('extends/views'), 'extends');

        setting()->put('app-custom-head', '<link rel="stylesheet" href="/custom.css">');
    }
}