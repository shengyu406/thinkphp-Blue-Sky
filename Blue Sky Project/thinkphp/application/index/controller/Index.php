<?php
/* Index控制器——显示网站首页 */

// 1.命名控制器空间
namespace app\index\controller;
// 2.引入系统的控制器类
use think\Controller;


// 3.创建类并继承父类
class Index extends Controller
{
	// 4.声明首页方法
    public function index()
    {
       // 6.将两个路径常量赋值到模板中
	   // $this->assign('模板变量' , '值')
	   $this->assign('css' , CSS_PATH); //CSS层叠样式路径
	   $this->assign('img' , IMG_PATH); //图片路径
	   
	   // 5.渲染当前模板文件
	   return $this->fetch();
    }
	
}
