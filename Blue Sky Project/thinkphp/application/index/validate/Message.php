<?php
// 1.命名验证器空间
namespace app\index\validate;
// 2.引入验证器文件
use think\Validate;
// 3创建新类并继承父类
class Message extends Validate{
	// 验证规则
	protected $rule = [
		['content' , 'require' , '留言内容不可为空'],
	];
}
?>