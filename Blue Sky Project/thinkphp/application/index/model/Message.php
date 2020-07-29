<?php
// 1.命名空间
namespace app\index\model;
// 2.引入系统的模型类
use think\Model;
// 3.创建类并继承父类
class Message extends Model{
	// 1.设置完整的数据表
	protected $table = "think_message";
	// 2.定义时间戳字段
	protected $createTime = "create_time";
	protected $updateTime = "update_time";

}
?>