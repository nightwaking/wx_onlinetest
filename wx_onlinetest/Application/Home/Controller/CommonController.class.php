<?php
namespace Home\Controller;

use Think\Controller;

class CommonController extends Controller{
	public function index(){
		$this->user_model = M('user');
        $id = session('USER_ID');
        if (IS_GET){
            if (empty($id)){
                $this->error('请先登录');
            }

            $where['uid'] = $id;
            $user = $this->user_model->where($where)
            ->select();
            $this->assign('kind', $user);
            $this->display();
        }else{
            $where['uid'] = $id;
            $username = I('post.username');
            if (empty($username)){
                $this->error('用户名不能为空');
            }

            $data['user_name'] = $username;
     

            $ls=$this->user_model->where($where)->save($data);
            if ($ls){
                $this->success("修改成功", U('Common/index'));
            }else{
                $this->error("修改失败!");
            }
        }
	}

	public function skillTest(){
		$this->skill_model = M("skill");
		$where['skill_status'] = 1;
		$kind = $this->skill_model->where($where)->select();
		$this->assign("kind", $kind);
		$this->display();
	}

	public function skillDisplay(){
		
		if(IS_GET){
			$this->question_model = M("question");
			$id = I('get.id', 0, 'intval');

			$where['add_id'] = $id;
			$where['question_type'] = 1;
			$kind = $this->question_model->where($where)->select();

			$count = $this->question_model->where($where)->count();
			$mark = $count*10;
			$this->assign("mark", $mark);
			$this->assign("sid", $id);
			$this->assign("count", $count);
			$this->assign("kind", $kind);
			$this->display();
		}else{
			$sid = I('post.sid');
			$count = I('post.count');
			$this->question_model = M("question");
			$where['add_id'] = $sid;
			$where['question_type'] = 1;
			$sum = 0;
			$kind = $this->question_model->where($where)->field('qid')->select();
			for ($i=0; $i<$count; $i++){
				$question = I('post.radio_'.$kind[$i]['qid']);	
				$num = ($question-1)*5;
				$sum = $sum + $num;
			}

			$this->smark_model = M("smark");
			$data['ski_id'] = $sid;
			$data['skill_mark'] = $sum;
			$data['user_id'] = session('USER_ID');
			$ls=$this->smark_model->add($data);
            if ($ls){
                $this->success("提交成功", U('Common/myScore'));
            }else{
                $this->error("提交失败!");
            }
		}
	}


	public function pysTest(){
		$this->skill_model = M("pyschology");
		$where['ps_status'] = 1;
		$kind = $this->skill_model->where($where)->select();
		$this->assign("kind", $kind);
		$this->display();
	}

	public function pyDisplay(){
		if (IS_GET){
			$this->question_model = M("question");
			$this->choice_model = M("choice");
			$id = I("get.id", 0, "intval");
			$type = I("get.type", 0, "intval");
			$where['add_id'] = $id;
			$where['question_type'] = $type;
			$qid = $this->question_model->where($where)->field('qid')->select();			
			$kind = $this->question_model->where($where)->select();

			$count = $this->question_model->where($where)->count();
			$pyList= "choice_sid=";
			for ($i=0; $i<$count; $i++){
				$question_id = $qid[$i]['qid'];
				$pyList = $pyList."'".$question_id."'"." "."or choice_sid=";
			}
			$pyList = $pyList."'null'";
			$choice = $this->choice_model->join('__QUESTION__ ON __QUESTION__.qid = __CHOICE__.choice_sid')
			->where($pyList)
			->select();

			$mark = $count*10;
			$this->assign("mark", $mark);
			$this->assign("sid", $id);
			$this->assign("count", $count);
			$this->assign("kind", $kind);
			$this->assign("choice", $choice);
			$this->display();
		}else{
			$sid = I('post.sid');
			$count = I('post.count');
			$this->question_model = M("question");
			$where['add_id'] = $sid;
			$where['question_type'] = 0;
			$sum = 0;
			$kind = $this->question_model->where($where)->field('qid')->select();

			for ($i=0; $i<$count; $i++){
				$question = I('post.radio_'.$kind[$i]['qid']);	
				$num = $i;
				$sum = $sum + $num;
			}

			$this->smark_model = M("pmark");
			$data['psy_id'] = $sid;
			$data['psy_mark'] = $sum;
			$data['user_id'] = session('USER_ID');
			$ls=$this->smark_model->add($data);
            if ($ls){
                $this->success("提交成功", U('Common/myScore'));
            }else{
                $this->error("提交失败!");
            }
		}

	}

	public function myScore(){
		$this->smark_model = M("smark");
		$where['user_id'] = session('USER_ID');
		$skill = $this->smark_model->join('__USER__ ON __USER__.uid = __SMARK__.user_id')
		->join('__SKILL__ ON __SKILL__.sid = __SMARK__.ski_id')
        ->where($where)
        ->order("mid")
        ->select();

       $this->pmark_model = M("pmark");
       $psy = $this->pmark_model->join('__USER__ ON __USER__.uid = __PMARK__.user_id')
		->join('__PYSCHOLOGY__ ON __PYSCHOLOGY__.pid = __PMARK__.psy_id')
       	->where($where)
        ->order("pm_id")
        ->select();

        $this->assign("psy", $psy);
        $this->assign("skill", $skill);
        $this->display();
	}
}