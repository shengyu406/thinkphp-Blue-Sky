<?php
// 1.命名控制器空间
namespace app\index\controller;
// 2.引入系统的控制器类
use think\Controller;
// 3.引入Message模型
use app\index\model\Message as MessageModel;
// 引入User模型
use app\index\model\User as UserModel;
// 引入Session
use think\Session;

// 4.创建类并继承父类
class Message extends Controller
{	
	// 5.声明list方法,查看所有留言信息
	public function list(){

		// 5.1先分页查询,每页查询5条
		$list = MessageModel::paginate(5);
		// 5.2声明一个数组
		$data = array();
		// 5.3遍历查询结果,$key作为数组下标,$user为数组内容
		foreach($list as $key=>$user)
		{
			// 5.4将查询的结果赋值给$data
			$data[$key]['content'] = $user->content;
			$data[$key]['update_time'] = $user->update_time;
			// 添加此处:将留言id进行赋值
			$data[$key]['mess_id'] = $user->id;
			// 此处添加:将留言的用户iduser_id进行赋值
			$data[$key]['user_id'] = $user->user_id;
			// 5.5判断用户id是否等于0
			if($user->user_id == 0){
				// 5.6如果是,用户名显示为"游客"
				$data[$key]['name'] = '游客';
			}else{
				// 5.7否则,查询相应的用户id
				$userlist = UserModel::get($user->user_id);
				// 将查询的用户名赋值给$data数组
				$data[$key]['name'] = $userlist->name;
			}
		}
		// 此处添加:获取session里面的id值
		$uid = Session::get('userID','admin');
		// 5.1.将两个路径常量赋值到模板中
		$this->assign('css' , CSS_PATH); //CSS层叠样式路径
		$this->assign('img' , IMG_PATH); //图片路径
		$this->assign('data' , $data); //留言信息结果
		$this->assign('list' , $list); //模型查询数据
		$this->assign('uid' , $uid); //用户id赋值
		
		// 5.2.渲染当前模板文件
		return $this->fetch();
	}
	
	// 6.新增留言操作
	public function add(){
		// 6.1实例化Message
		$message = new MessageModel;
		// 6.2先判断当前用户是否是游客,判断Session是否存在
		if(Session::has('userID','admin')){
			//6.3如果是,获取登陆者的ID
			$message->user_id = Session::get('userID','admin');	
		}else{
			//6.4否则,设置user_id为0,为游客
			$message->user_id = 0;
		}
		// 6.5提取留言内容赋值
		$message->content = input('post.content');
		// 6.6提取并过滤用户名
		$message->name = addslashes(trim(stripslashes(input('post.name'))));
		// 6.6判断是否将留言添加数据库成功
		if($message -> allowField(true)->validate(true)->save()){
			// 如果是,提示成功
			$this->success('用户留言成功');
		}else{
			// 否则提示失败
			$message->getError();
		}
	}
	
	// 7.留言更新操作——单条数据查询
	// 方法的参数$id是获取URL上的id值
	public function update($id=''){
		
		// 7.1 模型查询数据，get参数id，并以此为条件进行查询 
		$message = MessageModel::get($id);
		
		// 7.2将两个路径常量赋值到模板中
		$this->assign('css' , '../../public/index/css/'); //CSS层叠样式路径
		$this->assign('img' , '../../public/index/images/'); //图片路径
		// 7.2 将查询到的信息赋值到模板中
		$this->assign('message',$message);		
		// 7.3渲染当前模板文件
		return $this->fetch();	
	}
	// 7.留言更新操作——更新单条数据
	public function upd_add($id=''){
		// 7.5 根据获取到的id值查询出当前留言信息
		$message = MessageModel::get($id);
		// 7.6 将需要修改的数据,复制到对象信息中
		$message->content = input('post.content'); // 赋值留言
		$message->update_time = time();	//当前时间戳赋值更新时间
		// 7.7 将获取到的新数据通过save进行保存
		// 判断更新结果
		if($message->save()){
			// 如果更新成功,提示成功
			$this->success('留言更新成功',url('index/message/list'));
		}else{
			// 否则提示错误
			$message->getError();
		}	
	}
	
	// 8.留言删除功能
	public function delete($id=''){
		// 8.1 先根据URL中的id查询数据
		$message = MessageModel::get($id);
		// 8.2 判断是否查询成功
		if($message){
			// 如果是,执行删除功能并提示语句
			$message->delete();
			$this->success("留言删除成功",url('index/message/list'));
		}else{
			// 否则提示错误
			$this->getError();
		}
	}
}	