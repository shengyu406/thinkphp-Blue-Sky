<?php
// 1.命名空间
namespace app\index\model;
// 2.引入系统的模型类
use think\Model;
// 3.创建类并继承父类
class User extends Model
{
	// 1.设置完整的数据表
	protected $table = 'think_user';
	
	// 2.定义时间戳字段
	protected $createTime = "create_time";
	
	// 3.定义自动完成的属性
	protected $insert = ['status' => 1];

}