<?php
/* User控制器主要显示登录与注册页面并实现注册登录功能 */
// 1.命名控制器空间
namespace app\index\controller;
// 2.引入系统的控制器类
use think\Controller;
// 3.引入Index模型
use app\index\model\User as UserModel;
// 引入Login模型
use app\index\model\Login as LoginModel;
// 引入请求类
use think\Request;
// 引入Session
use think\Session;


// 4.创建类并继承父类
class User extends Controller
{
	// 7.声明登录方法
	public function login(){
		// 7.1配置Session并初始化
		Session::init([
			'prefix' => 'admin', //Session前缀
			'use_trans_sid' => 1, //跨页传递
		]);
		// 7.2实例化Login对象
		$login = new LoginModel;
		// 7.3调用请求类的instance
		$request = Request::instance();
		// 7.4判断是否是post请求
		if($request->isPost()){
			// 7.5发生数据提交后,提取post里面的数据并过滤
			$name = addslashes(trim(stripslashes(input('post.name'))));
			$pwd = addslashes(trim(stripslashes(input('post.password'))));
			// 7.6引用Index模型以用户名和密码作为查询条件
			$user = UserModel::get(['name'=>$name , 'password'=>$pwd]);
			// 7.7判断是否查询成功,获得id值
			if($user->id){
				// 7.8将查询的id值赋值给登录表user_id
				$login->user_id = $user->id;
				// 将查询到的ID值赋值给session
				Session::set('userID',$login->user_id,'admin');
				// 7.8将当前时间戳赋值给邓论时间login_time
				$login->login_time = time();
				// 7.9将id值和时间存储到鼠标中
				$login->allowField(true)->save();
				//7.10显示登录成功并跳转到留言板页面
				$this->success('登录成功',url('index/message/list'));
			}else{
				// 7.11失败显示错误信息
				$login->getError();				
			}
		}else{
			// 7.12 常量模板赋值
			$this->assign('css' , CSS_PATH); //CSS层叠样式路径
			$this->assign('img' , IMG_PATH); //图片路径
			// 7.13 渲染当前模板文件
			return $this->fetch();			
		}
	}
	
	// 10.声明注册方法
	public function register(){
		// 10.1实例化Index模型
		$user = new UserModel;
		//10.2判断常量POST是否为空
		if(!empty($_POST)){
			//不为空,表示表单有数据提交
			// 10.3 获取控制台的post提交的数据
			$data = input('post.');
			// 10.4 过滤字段以及验证数据后,判断是否添加数据库成功
			if( $user->allowField(true)->validate(true)->save($data) ){
				// 10.5 提示注册成功,并且跳转到登录页
				$this->success('注册成功',url('index/user/login'));
			}else{
				// 10.6 显示错误信息
				return $user->getError();
			}		
		}else{
			//为空表示没有表单数据提交,输出渲染模板
			// 10.7.常量模板赋值
			$this->assign('css' , CSS_PATH); //CSS层叠样式路径
			$this->assign('img' , IMG_PATH); //图片路径
			// 10.8.渲染当前模板文件
			return $this->fetch();
		}
	}
}
