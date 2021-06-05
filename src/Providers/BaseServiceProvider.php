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

        $cssLink = '/custom/custom.css';
        $jsLink = '/custom/custom.js';
        $faviconLink = '/custom/favicon.ico';
        $cssPath = public_path($cssLink);
        $jsPath = public_path($jsLink);
        $faviconPath = public_path($faviconLink);

        // 加载自定义CSS
        $cssSeting = '<link rel="stylesheet" href="'.$cssLink.'">';
        if (file_exists($cssPath) && !strstr($setting, $cssLink)) {
            $setting = $setting.PHP_EOL.$cssSeting;
            $settingChanged = true;
        }
        
        // 加载自定义JS
        $jsSeting = '<script src="'.$jsLink.'"></script>';
        if (file_exists($jsPath) && !strstr($setting, $jsLink)) {
            $setting = $setting.PHP_EOL.$jsSeting;
            $settingChanged = true;
        }

        // 加载自定义favicon.ico
        $faviconSetting = '<link rel="shortcut icon" href="'.$faviconLink.'"/>';
        if (file_exists($faviconPath) && !strstr($setting, $faviconLink)) {
            $setting = $setting.PHP_EOL.$faviconSetting;
            $settingChanged = true;
        }

        // 如果custom.css文件不存在，删除设置
        if (!file_exists($cssPath) && strstr($setting, $cssLink)) {
            $setting = str_replace($cssSeting, '', $setting);
            $settingChanged = true;
        }

        // 如果custom.js文件不存在，删除设置
        if (!file_exists($jsPath) && strstr($setting, $jsLink)) {
            $setting = str_replace($jsSeting, '', $setting);
            $settingChanged = true;
        }

        // 如果custom.js文件不存在，删除设置
        if (!file_exists($jsPath) && strstr($setting, $jsLink)) {
            $setting = str_replace($jsSeting, '', $setting);
            $settingChanged = true;
        }

        // 如果favicon.ico文件不存在，删除设置
        if (!file_exists($faviconPath) && strstr($setting, $faviconLink)) {
            $setting = str_replace($faviconSetting, '', $setting);
            $settingChanged = true;
        }

        if ($settingChanged) {
            setting()->put('app-custom-head', $setting);
        }
    }
}