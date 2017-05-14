<?php
namespace Home\Controller;

use Think\Controller;

class AdminController extends Controller{
    /**
    * 管理员技能测试题操作
    */
	public function index(){
		$this->user_model = M('user');
		if (IS_GET){
			$where['user_type'] = 0;
			$kind = $this->user_model
	        ->where($where)
	        ->order("uid")
	        ->select();
	        $this->assign("kind", $kind);
			$this->display();
		}
	}

	public function delete(){
        $id = I('get.id', 0, 'intval');
        $this->user_model = M("user");
        if ($this->user_model->delete($id)!= false){
            $this->success("移除成功", U('Admin/index'));
        }else{
            $this->error("移除失败");
        }
    }

    public function skill_log(){
    	$this->skill_model = M("skill");
    	$kind = $this->skill_model
	        ->where($where)
	        ->order("sid")
	        ->select();
	    $this->assign("kind", $kind);
    	$this->display();
    }

    public function add_skill(){
    	$this->skill_model = M("skill");
    	if (IS_GET){
            $this->display();
        }else{
            $data['skill_name'] = I('post.skill_name');
            $data['skill_time'] = date("Y-m-d H:i:s");
            $data['skill_status'] = 1;
            $ls = $this->skill_model->add($data);
            if ($ls){
                $this->success("添加成功", U('Admin/skill_log'));
            }else{
                $this->error("添加失败");
            }
        }
    }

    public function skill_display(){
    	$this->question_model = M("question");
    	if (IS_GET){
    		$id = I('get.id', 0, 'intval');
    		$type = I('get.type', 0, 'intval');
    		$where['add_id'] = $id; 
    		$where['question_type'] = $type;
    		$kind = $this->question_model
	        ->where($where)
	        ->order("qid")
	        ->select();
	        $this->assign("skillid", $id);
	    	$this->assign("kind", $kind);
    		$this->display();
    	}
    }

    public function skill_status(){
        $this->skill_model = M("skill");
        $sid = I('get.id', 0, 'intval');
        $status = I('get.status', 0, 'intval');
        
        if ($status == 1){
            $skill_status = 0; 
        }else{
            $skill_status = 1;
        }
        $where['sid'] = $sid;
        $data['skill_status'] = $skill_status;
        $ls=$this->skill_model->where($where)->save($data);
        if ($ls){
            $this->success("修改成功", U('Admin/skill_log'));
        }else{
            $this->error("修改失败!");
        }
    }

    public function skill_delete(){
        $this->skill_model = M('skill');
        $sid = I('get.id', 0, 'intval');
        if ($this->skill_model->delete($sid)!= false){
            $this->success("删除成功", U('Admin/skill_log'));
        }else{
            $this->error("删除失败");
        }

    }

    public function add_question(){
    	$this->question_model = M("question");
    	if (IS_GET){
            $skill_id = I('request.skill_id');
            $type = I('request.q_type');
            $number = I('request.select_number');
            $this->assign("skill_id", $skill_id);
            $this->assign("type", $type);
            $this->assign("number", $number+1);
	    	$this->display();
	    }else{
            $number = I('post.num');
            $skill_id = I('post.skill_id');
            $type = I('post.type');
            for ($i=0; $i<$number; $i++){
                $question = I('post.question_'.$i);

                $dataList[] = array('q_question'=> $question, 'add_id' => $skill_id,
                    'question_type' => $type, 'add_time' => date("Y-m-d H:i:s"),
                    'q_answer' => 1);
            }

            $ls = $this->question_model->addAll($dataList);
            if ($ls){
                $this->success("添加成功", U('Admin/skill_display', array('id'=>$skill_id, 'type'=>$type)));
            }else{
                $this->error("添加失败");
            }
        }
    }

    public function question_delete(){
        $this->question_model = M("question");
        $id = I('get.id', 0, 'intval');
        $where['qid'] = $id;
        $where['question_type'] = 1;
        if ($this->question_model->where($where)->delete() != false){
            $this->success("删除成功", U('Admin/skill_log'));
        }else{
            $this->error("删除失败");
        }
    }

    
}