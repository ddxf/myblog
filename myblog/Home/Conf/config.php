<?php
return array(
    //'配置项'=>'配置值'
    //开启路由
    'URL_ROUTER_ON'   => true, // 是否开启URL路由
    'URL_ROUTE_RULES' => array(
    	'login'=>'Login/index',
        'code' => 'Code/showCode', //展示验证码
        'perdiary'=>'Person/index',
        'new_list/:id'=>'List/new_list',
        'comintinfo/:id'=>'List/insert',
        'register'=>'Register/index',
        'delregister'=>'Register/register',
        'class/:id'=>'Class/index',
        'seach'=>'Class/index',
        'dealLogin'=>'Login/dealLogin',
        'fileds'=>'Filed/index',
        'insertangle'=>'Filed/update',
        'outline'=>'Login/out',

    ),
);
