<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
   
    //注意:首页的路由不需要配置,此处只为了便于查看
    'index/index'     		=> 'index/index/index', //首页
    'index/login'     		=> 'index/user/login',//登录
    'index/register'  		=> 'index/user/register',//注册
    'message/list'			=> 'index/message/list',  //留言列表
	'message/add'     		=> 'index/message/add',  //留言列表
    'message/update/:id' 	=> 'index/message/update',//修改
    'message/delete/:id' 	=> 'index/message/delete',//删除
    'message/:id'        	=> 'index/message/read',//单条查询

];
