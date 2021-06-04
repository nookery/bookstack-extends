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

        $setting = setting()->get('app-custom-head');
        $settingChanged = false;
        $cssPath = public_path('custom.css');
        $jsPath = public_path('custom.js');

        // 加载自定义CSS
        $cssSeting = '<link rel="stylesheet" href="/custom.css">';
        if (file_exists($cssPath) && !strstr($setting, 'custom.css')) {
            $setting = $setting.PHP_EOL.$cssSeting;
            $settingChanged = true;
        }
        
        // 加载自定义JS
        $jsSeting = '<script src="/custom.js"></script>';
        if (file_exists($jsPath) && !strstr($setting, 'custom.js')) {
            $setting = $setting.PHP_EOL.$jsSeting;
            $settingChanged = true;
        }

        // 如果custom.css文件不存在，删除设置
        if (!file_exists($cssPath) && strstr($setting, 'custom.css')) {
            $setting = str_replace($cssSeting, '', $setting);
            $settingChanged = true;
        }

        // 如果custom.js文件不存在，删除设置
        if (!file_exists($jsPath) && strstr($setting, 'custom.js')) {
            $setting = str_replace($jsSeting, '', $setting);
            $settingChanged = true;
        }

        if ($settingChanged) {
            setting()->put('app-custom-head', $setting);
        }
    }
}