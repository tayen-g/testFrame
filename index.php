<?php
/**
 * 框架运行流程：
 * 1、入口文件
 * 2、定义常量
 * 3、引入函数库
 * 4、自动加载类
 * 5、启动框架
 * 6、路由解析
 * 7、加载控制器
 */

/**
 * 入口文件
 * 1、定义常量
 * 2、加载函数库
 * 3、启动框架
 */
define('FR_DIR', realpath('./'));
define('CORE', FR_DIR . '/core');
define('APP', FR_DIR . '/app');
define('DEBUG', true);

include "vendor/autoload.php";

if (DEBUG) {
    /**
     * composer 错误信息显示
     */
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();

    ini_set('display_error', 'on');
} else {
    ini_set('display_error', 'off');
}

// dump($whoops);  //composer  dump()测试
include CORE . '\common\function.php';

include CORE . '\keyfile.php';
spl_autoload_register('\core\keyfile::load');

\core\keyfile::run();
