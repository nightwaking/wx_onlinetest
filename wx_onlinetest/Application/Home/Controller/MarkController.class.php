<?php
namespace Home\Controller;

use Think\Controller;

class MarkController extends Controller{
	public function index(){
		$this->smark_model = M("smark");
		$skill = $this->smark_model->join('__USER__ ON __USER__.uid = __SMARK__.user_id')
		->join('__SKILL__ ON __SKILL__.sid = __SMARK__.ski_id')
        ->where()
        ->order("mid")
        ->select();

       $this->pmark_model = M("pmark");
       $psy = $this->pmark_model->join('__USER__ ON __USER__.uid = __PMARK__.user_id')
		->join('__PYSCHOLOGY__ ON __PYSCHOLOGY__.pid = __PMARK__.psy_id')
       	->where()
        ->order("pm_id")
        ->select();

        $this->assign("psy", $psy);
        $this->assign("skill", $skill);
        $this->display();
	}
}