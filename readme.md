Laravel Hammer 🔨
============

## 介绍

Laravel 的 Artisan 命令扩展包，增加清理缓存、刷新应用等功能。

## 安装

```shell
composer require nookery/laravel-hammer --dev
```

## 使用
```shell
php artisan ping

# 输出
pang
```

可用的命令：

| 命令         | 用途|
|  ----       | ---- |
| check       | 检查代码、生成IDE辅助文件、运行单元测试| 
| clear       | 清理一切缓存 |
| fix         | 检查和修正代码 |
| foo         | 输出：bar| 
| fresh       | 清理缓存，重装依赖，刷新应用|
| ide         | 生成IDE辅助文件|
| make:database {name}         | 新建数据库|
| ping        | 输出：pang| 
| version     | 输出重要组件的版本号| 
