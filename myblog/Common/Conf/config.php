<?php
return array(
	//'配置项'=>'配置值'
    // 允许访问的模块列表
    'MODULE_ALLOW_LIST'    =>    array('Home','Admin'),
    'DEFAULT_MODULE'       =>    'Home',  // 默认模块
    
     'URL_MODEL'          => '2', //URL模式 REWRITE模式
    
    "SHOW_PAGE_TRACE" => TRUE,
    
    
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'myblog', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '1', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'blog_', // 数据库表前缀 
    'DB_CHARSET'=> 'utf8', // 字符集
);