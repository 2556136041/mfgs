<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 开启调试模式
define('APP_DEBUG', false);
// 定义应用目录名称
define('APP_NAME','app');
// 定义应用目录
define('APP_PATH','./app/');
// 定义配置目录
define('CONF_PATH','./conf/');
// 绑定模块
//define('BIND_MODULE', 'common');
define('BIND_MODULE', 'index/Index'); // 绑定Home模块到当前入口文件
//define('BIND_CONTROLLER','Index'); // 绑定Index控制器到当前入口文件
// 加载框架引导文件
require './thinkphp/start.php';
