Bookstack Extends
============

## 介绍

扩展Bookstack，实现增加自定义路由、增加自定义页面等功能。

## 安装

```shell
composer require nookery/bookstack-extends
```

## 使用

要加载的路由存储在`base_path/extends/route.php`文件中，即可实现自定义路由；  
要自定义的视图文件存储在`base_path/extends/views/`文件夹中。

假设需要增加`about页面`，参考代码：

```php
Route::view('/about', 'extends::about')->name('about');
```

