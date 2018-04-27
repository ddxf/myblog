<?php
return array(
    //'配置项'=>'配置值'
    //开启路由
    'URL_ROUTER_ON'   => true, // 是否开启URL路由
    'URL_ROUTE_RULES' => array(
        'login'     => 'Login/index', //展示登录页面
        'dealLogin' => 'Login/dealLogin', //执行登录
        'logout'    => 'Login/dealLogout', //执行注销
        'typelist'=>'Type/index',//显示类别列表
         'typeadd'=>'Type/add',   //展示添加页面
         'dealtypeadd'=>'Type/insert',// 执行添加操作
         'typeedit/:id'=>'Type/edit',   //展示编辑页面//需要知道编辑的哪一类别
         'dealtypeedit'=>'Type/update',     //执行编辑操作update
        
        'dealtypedelete/:id'=>'Type/delete',      //删除单个类别
        
        'dealtypedeletes'=>'Type/deletes',          //批量删除类别
         'dealtypedeletess'=>'Type/deletess',          //批量删除类别(事务)
        
        'typerecovery/:id'=>'Type/recovery',//恢复单个类别
        




        'articlelist'=>'Article/index',//显示类别列表
        'articleadd'=>'Article/add',//显示添加类别列表
        'articleinsert'=>'Article/insert',//添加操作
        "addeditorimg"=>'File/uploadEditorImage',
        'articleedit/:id'=>'Article/edit',//显示修改文章添加列表
        'articleupdate'=>'Article/update',//显示修改文章添加列表
        'articledelete/:id'=>'Article/delete',//删除单个文章
        'articledeletes'=>'Article/deletes',//删除单个文章
        'articledeletes'=>'Article/deletes',//删除单个文章
        'articlerecovery/:id'=>'Article/recovery',//恢复单个文章
        'talkall'=>'Talk/index',
        'artrecover/:id'=>'Talk/recover',//文章回复页面展示
        'recoverinsert'=>'Talk/insert',

    ), // 默认路由规
);
