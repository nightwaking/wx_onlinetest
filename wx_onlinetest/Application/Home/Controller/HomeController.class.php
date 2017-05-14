<?php
namespace Home\Controller;

use Think\Controller;

class HomeController extends Controller{
	public function index(){
		if (session('type') == 1){
			$this->display('Home/adminIndex');
		}else{
			$this->display('Home/userIndex');
		}
	}
}