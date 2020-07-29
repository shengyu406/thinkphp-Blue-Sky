<?php
// 1.命名验证器空间
namespace app\index\validate;
// 2.引入验证器文件
use think\Validate;
// 3.创建类并继承父类
class User extends Validate{
	// 设置验证规则
	protected $rule = [
		['name' , 'require|min:3' , '用户名不能为空|用户名不能短于3个字符'],
		['password' , 'require|min:5' , '密码不能为空 |密码不得短于5'],
		['email' , 'email' , '邮箱格式错误'],
		['phone' , 'checkPhone' , '手机号码格式错误']
	];
	
	//验证手机格式,是否符合指定格式
	protected function checkPhone($value){
		return 1 == preg_match('/^1[34578]\d{9}$/' , $value);
	}	
}
?>