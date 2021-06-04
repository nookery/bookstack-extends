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

        // 加载自定义CSS
        $appCustomHeadSetting = setting()->get('app-custom-head');
        if (file_exists(public_path('custom.css')) && !strstr($appCustomHeadSetting, 'custom.css')) {
            setting()->put('app-custom-head', $appCustomHeadSetting.PHP_EOL.'<link rel="stylesheet" href="/custom.css">');
        }
        
        // 加载自定义JS
        $appCustomHeadSetting = setting()->get('app-custom-head');
        if (file_exists(public_path('custom.js')) && !strstr($appCustomHeadSetting, 'custom.js')) {
            setting()->put('app-custom-head', $appCustomHeadSetting.PHP_EOL.'<script src="/custom.js"></script>');
        }
    }
}