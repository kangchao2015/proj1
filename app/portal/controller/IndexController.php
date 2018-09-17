<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2018 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 老猫 <thinkcmf@126.com>
// +----------------------------------------------------------------------
namespace app\portal\controller;

use cmf\controller\HomeBaseController;
use think\View as 		V;
use think\request as 	R;
use think\Db as 		D;

class IndexController extends HomeBaseController
{


	public function aaa(){


		$ret = D::name("nav_menu")->select();
		$ret = db("nav_menu")->select();
		$ret = db("nav_menu")->name("id");
		$ret = D::getTableInfo("cmf_nav_menu");
		dump($ret);

	}

	public function  show(R $request){


			// 获取当前域名
		$ret = $request->domain() ;

		// 获取当前入口文件
		$ret = $request->baseFile();

		// 获取当前URL地址 不含域名
		$ret = $request->url();

		// 获取包含域名的完整URL地址
		$ret = $request->url(true);

		// 获取当前URL地址 不含QUERY_STRING
		$ret = $request->baseUrl();

		// 获取URL访问的ROOT地址
		$ret = $request->root();
		// 获取URL访问的ROOT地址包含域名
		$ret = $request->root(true);

		// 获取URL地址中的PATH_INFO信息
		$ret = $request->pathinfo();
		// 获取URL地址中的PATH_INFO信息 不含后缀
		$ret = $request->path();
		//获取URL地址中的后缀信息
		$ret = $request->ext();


		// 获取当前应用(模块)
		$ret = $request->module();

		// 获取当前控制器
		$ret = $request->controller();

		// 获取当前操作名称
		$ret = $request->action();

		// 获取当前请求方法
		$ret = $request->method();

		// 获取当前请求访问地址
		$ret = $request->type();

		// 获取当前访问者 ip地址
		$ret = $request->ip();

		// 获取当前访问者 真实ip地址(防止代理)
		$ret = $request->ip(0,true);


		dump($ret);



	}

    public function index()
    {

//模板返回的第一种方法
        // return $this
        // 	->assign([
        // 		"name"	=>	"kangchao",
        // 		"age"	=>	99
        // 	])
        // 	->fetch(':index');

//模板返回的第二种方法
        // return $this->fetch(':index',[
        // 	"name" 	=> "aaaa",
        // 	'age'	=>	999
        // ]);

//模板返回的第三种方法  用来显示定制的内容
//全局的变量赋值
    	// V::share([
    	// 	'aaa'	=>	'bbb'
    	// ]);


     //    $tpl  = '{$name}  --------loves---------{$age}   {$aaa}';
     //    return $this->display($tpl,[
     //    	"name" => "kangchao123",
     //    	"age"	=>	123
     //    ]);


//模板渲染
    	V::share([
    		'name'	=>	"aadfsasdf123"
    	]);

    	echo "index";


    	$a = cmf_url('portal/List/index',['id'=>1,'name'=>'cmf5']);

		$b = url('portal/List/index','id=1&name=cmf5', 'shtml', true);

		dump($b);
		dump($a);

		// $this->redirect('http://www.thinkcmf.com',302);
		// $this->error('添加成功', "portal/index/show");

//----------------------------------------
//模板调用

        // return $this->fetch('aaa');
        // return $this->fetch('bbb/aaa');
        // return $this->fetch('ccc@bbb/aaa');

        // return $this->fetch(':list');

    }
}
