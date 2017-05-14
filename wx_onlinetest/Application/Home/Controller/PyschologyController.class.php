<?php
namespace Home\Controller;

use Think\Controller;

class PyschologyController extends Controller{
	public function index(){
		$this->pyschology_model = M("pyschology");
    	$kind = $this->pyschology_model
	        ->where($where)
	        ->order("pid")
	        ->select();
	    $this->assign("kind", $kind);
		$this->display();
	}

	public function pyschology_display(){
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

	public function pyschology_add(){
		$this->pyschology_model = M("pyschology");
    	if (IS_GET){
            $this->display();
        }else{
            $data['p_name'] = I('post.p_name');
            $data['ps_time'] = date("Y-m-d H:i:s");
            $data['ps_status'] = 1;
            $ls = $this->pyschology_model->add($data);
            if ($ls){
                $this->success("添加成功", U('Pyschology/index'));
            }else{
                $this->error("添加失败");
            }
        }
	}

	public function pyschology_delete(){
        $this->pyschology_model = M('pyschology');
        $sid = I('get.id', 0, 'intval');
        if ($this->pyschology_model->delete($sid)!= false){
            $this->success("删除成功", U('Pyschology/index'));
        }else{
            $this->error("删除失败");
        }

    }

    public function pyschology_status(){
    	$this->pyschology_model = M("pyschology");
        $sid = I('get.id', 0, 'intval');
        $status = I('get.status', 0, 'intval');
        
        if ($status == 1){
            $skill_status = 0; 
        }else{
            $skill_status = 1;
        }
        $where['pid'] = $sid;
        $data['ps_status'] = $skill_status;
        $ls=$this->pyschology_model->where($where)->save($data);
        if ($ls){
            $this->success("修改成功", U('Pyschology/index'));
        }else{
            $this->error("修改失败!");
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
            for ($i=1; $i<$number; $i++){
                $question = I('post.question_'.$i);

                $dataList[] = array('q_question'=> $question, 'add_id' => $skill_id,
                    'question_type' => $type, 'add_time' => date("Y-m-d H:i:s"),
                    'q_answer' => 1);
            }

            $ls = $this->question_model->addAll($dataList);
            if ($ls){
                $this->success("添加成功", U('Pyschology/pyschology_display', array('id'=>$skill_id, 'type'=>$type)));
            }else{
                $this->error("添加失败");
            }
        }
    }

    public function question_delete(){
        $this->question_model = M("question");
        $id = I('get.id', 0, 'intval');
        $where['qid'] = $id;
        $where['question_type'] = 0;
        if ($this->question_model->where($where)->delete() != false){
            $this->success("删除成功", U('Pyschology/index'));
        }else{
            $this->error("删除失败");
        }
    }

    public function add_choice(){
        if (IS_GET){
            $qid = I('get.id', 0, 'intval');
            $sid = I('get.sid', 0, 'intval');
            $this->choice_model = M("choice");

            $where['choice_sid'] = $qid;
            $kind = $this->choice_model->where($where)->select();

            $this->assign("kind", $kind);
            $this->assign("qid", $qid);
            $this->assign("sid", $sid);
            $this->display();
        }else{
            $this->choice_model = M("choice");
            $choice_id = I('post.skill_id');
            $skill_id = I('post.s_id');

            for ($i=1; $i<5; $i++){
                $choice = I('post.choice_'.$i);

                $dataList[] = array('choice_name'=> $choice, 'choice_sid' => $choice_id);
            }
            $ls = $this->choice_model->addAll($dataList);
            if ($ls){
                $this->success("添加成功",  U('Pyschology/pyschology_display', array('id'=>$skill_id, 'type'=>0)));
            }else{
                $this->error("添加失败");
            }
        }
    }

    public function choice_delete(){
        $this->choice_model = M("choice");
        $id = I('get.id', 0, 'intval');
        $sid = I('get.sid', 0, 'intval');
        $where['cid'] = $id;

        if ($this->choice_model->where($where)->delete() != false){
            $this->success("删除成功", U('Pyschology/index'));
        }else{
            $this->error("删除失败");
        }
    }
}