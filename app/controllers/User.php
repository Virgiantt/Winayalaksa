<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect('user/dashboard');
	}

	public function dashboard(){
		$data['announcement'] = $this->db->get('announcement')->row_array();
		$this->load->view("user/app/header");
		$this->load->view("user/app/navbar");
		$this->load->view("user/dashboard/index",$data);
		$this->load->view("user/app/footer");
		$this->load->view("user/soal/js/index");
	}

	public function soal($id = null){
		if($id != null){
	        $this->db->delete("answer_detail",[
	            'answer_id' => $id
	        ]);
	        $this->db->delete("answer",[
	            'id' => $id
	        ]);
	        redirect('user/soal');
		}
		$this->session->unset_userdata('question_id');
		$this->session->unset_userdata('question_start_time');
        $this->session->unset_userdata('question_duration');

		$this->load->view("user/app/header");
		$this->load->view("user/app/navbar");
		$this->load->view("user/soal/index");
		$this->load->view("user/app/footer");
		$this->load->view("user/soal/js/index");
	}

	public function latihan($id = null){
		if($id != null){
	        $this->db->delete("answer_detail",[
	            'answer_id' => $id
	        ]);
	        $this->db->delete("answer",[
	            'id' => $id
	        ]);
	        redirect('user/latihan');
		}

		$this->session->unset_userdata('question_id');
		$this->session->unset_userdata('question_start_time');
        $this->session->unset_userdata('question_duration');

		$this->load->view("user/app/header");
		$this->load->view("user/app/navbar");
		$this->load->view("user/latihan/index");
		$this->load->view("user/app/footer");
		$this->load->view("user/latihan/js/index");
	}

	public function do_soal($id = null){
		if($id == null) redirect('user');

		$session_question_id = $this->session->userdata('question_id');
		if(isset($session_question_id)){
			$this->session->unset_userdata('question_id');
			$this->session->unset_userdata('question_start_time');
	        $this->session->unset_userdata('question_duration');
	        redirect('user/latihan');
		}

        $this->db->insert('answer',[
            'user_id' => $this->session->userdata('id'),
            'question_id' => $id,
        ]);

		$data['question'] = $this->db->get_where('question',['id'=>$id])->row_array();
        $answer = $this->db->order_by('answer.id','desc')->get_where('answer',['user_id' => $this->session->userdata('id'), 'question_id' => $id])->row_array();
        $answer_id = $answer['id'];

		$data['question_detail'] = $this->db
			->select("question_detail.*, (SELECT answer_detail.selected from answer_detail where answer_detail.answer_id = '$answer_id' and answer_detail.question_detail_id = question_detail.id) as checked, $answer_id as answer_id")
			->group_by('question_detail.id')
			->order_by('question_detail.id','asc')
			->get_where('question_detail',[
				'question_detail.question_id' => $id,
			])
			->result_array();

		foreach ($data['question_detail'] as $key => $value) {
			$data['question_detail'][$key]['choice'] = $this->db->order_by('id', 'ASC')->get_where('choice',['question_detail_id'=>$value['id']])->result_array();
		}

		$session_question_id = $this->session->userdata('question_id');
		if(!isset($session_question_id)){
			$this->session->set_userdata('question_id', $id);
			$this->session->set_userdata('question_start_time', time());
	        $this->session->set_userdata('question_duration', $data['question']['time'] * 60);
		}else{
			if ($session_question_id != $id) {
				$this->session->set_userdata('question_id', $id);
				$this->session->set_userdata('question_start_time', time());
		        $this->session->set_userdata('question_duration', $data['question']['time'] * 60);
			}
		}

		$this->load->view("user/app/header");
		$this->load->view("user/app/navbar");
		$this->load->view("user/do_soal/index",$data);
		$this->load->view("user/app/footer");
		$this->load->view("user/do_soal/js/index");
	}

	public function do_latihan($id = null){
		if($id == null) redirect('user');

		$session_question_id = $this->session->userdata('question_id');
		if(isset($session_question_id)){
			$this->session->unset_userdata('question_id');
			$this->session->unset_userdata('question_start_time');
	        $this->session->unset_userdata('question_duration');
	        redirect('user/latihan');
		}

        $this->db->insert('answer',[
            'user_id' => $this->session->userdata('id'),
            'question_id' => $id,
        ]);

		$data['question'] = $this->db->get_where('question',['id'=>$id])->row_array();
        $answer = $this->db->order_by('answer.id','desc')->get_where('answer',['user_id' => $this->session->userdata('id'), 'question_id' => $id])->row_array();
        $answer_id = $answer['id'];

		$data['question_detail'] = $this->db
			->select("question_detail.*, (SELECT answer_detail.selected from answer_detail where answer_detail.answer_id = '$answer_id' and answer_detail.question_detail_id = question_detail.id) as checked, $answer_id as answer_id")
			->group_by('question_detail.id')
			->order_by('question_detail.id','asc')
			->get_where('question_detail',[
				'question_detail.question_id' => $id,
			])
			->result_array();

		foreach ($data['question_detail'] as $key => $value) {
			$data['question_detail'][$key]['choice'] = $this->db->order_by('id', 'ASC')->get_where('choice',['question_detail_id'=>$value['id']])->result_array();
		}

		$session_question_id = $this->session->userdata('question_id');
		if(!isset($session_question_id)){
			$this->session->set_userdata('question_id', $id);
			$this->session->set_userdata('question_start_time', time());
	        $this->session->set_userdata('question_duration', $data['question']['time'] * 60);
		}else{
			if ($session_question_id != $id) {
				$this->session->set_userdata('question_id', $id);
				$this->session->set_userdata('question_start_time', time());
		        $this->session->set_userdata('question_duration', $data['question']['time'] * 60);
			}
		}

		$this->load->view("user/app/header");
		$this->load->view("user/app/navbar");
		$this->load->view("user/do_latihan/index",$data);
		$this->load->view("user/app/footer");
		$this->load->view("user/do_latihan/js/index");
	}

	public function hasil(){
        $class_id = $this->session->userdata('class_id');
        $class = $this->db->get_where("class",['id'=>$class_id])->row_array()['access_question'];
        $class = explode(',', $class);

		$data['exam'] = $this->db
			->select('answer.id as answer_id, question.*')
			->join('question', 'question.id = answer.question_id','left')->where_in('question.id', $class )
			->get_where('answer',['question.type'=>'exam','answer.user_id' => $this->session->userdata('id')])->result_array();
		foreach ($data['exam'] as $key => $value) {
			$count_point_twk = 0;
			$count_point_tiu = 0;
			$count_point_tkp = 0;

			$count_point = $this->db
				->select('choice.point')
				->join('answer_detail', 'answer_detail.answer_id = answer.id','left')
				->join('choice', 'choice.id = answer_detail.choice_id','left')
				->get_where('answer',[
					'answer.id'=>$value['answer_id']
				])
				->result_array();

			foreach ($count_point as $key2 => $value2) {
				if($key2+1 <= 30){
					$count_point_twk += $value2['point'];
				}
				if($key2+1 > 30 && $key2+1 <= 65){
					$count_point_tiu += $value2['point'];
				}
				if($key2+1 > 65 && $key2+1 <= 110){
					$count_point_tkp += $value2['point'];
				}
			}

			$kelulusan = "Lulus";
			if($kelulusan == "Lulus" && $count_point_twk < $value['pg_twk']){
				$kelulusan = "Tidak Lulus";
			}
			if($kelulusan == "Lulus" && $count_point_tiu < $value['pg_tiu']){
				$kelulusan = "Tidak Lulus";
			}
			if($kelulusan == "Lulus" && $count_point_tkp < $value['pg_tkp']){
				$kelulusan = "Tidak Lulus";
			}

			$data['exam'][$key]['count_point'] = $count_point_twk + $count_point_tiu + $count_point_tkp;
			$data['exam'][$key]['kelulusan'] = $kelulusan;
		}

		$data['practice'] = $this->db
			->select('answer.id as answer_id, question.*')
			->join('question', 'question.id = answer.question_id','left')
			->get_where('answer',['question.type'=>'practice','answer.user_id' => $this->session->userdata('id')])->result_array();

		foreach ($data['practice'] as $key => $value) {
			$count_point_twk = 0;
			$count_point_tiu = 0;
			$count_point_tkp = 0;

			$count_point = $this->db
				->select('choice.point')
				->join('answer_detail', 'answer_detail.answer_id = answer.id','left')
				->join('choice', 'choice.id = answer_detail.choice_id','left')
				->get_where('answer',[
					'answer.id'=>$value['answer_id']
				])
				->result_array();

			foreach ($count_point as $key2 => $value2) {
				if($key2+1 <= 30){
					$count_point_twk += $value2['point'];
				}
				if($key2+1 > 30 && $key2+1 <= 65){
					$count_point_tiu += $value2['point'];
				}
				if($key2+1 > 65 && $key2+1 <= 110){
					$count_point_tkp += $value2['point'];
				}
			}

			$kelulusan = "Lulus";
			if($kelulusan == "Lulus" && $count_point_twk < $value['pg_twk']){
				$kelulusan = "Tidak Lulus";
			}
			if($kelulusan == "Lulus" && $count_point_tiu < $value['pg_tiu']){
				$kelulusan = "Tidak Lulus";
			}
			if($kelulusan == "Lulus" && $count_point_tkp < $value['pg_tkp']){
				$kelulusan = "Tidak Lulus";
			}
			
			$data['practice'][$key]['count_point'] = $count_point_twk + $count_point_tiu + $count_point_tkp;
			$data['practice'][$key]['kelulusan'] = $kelulusan;
		}

		$this->load->view("user/app/header");
		$this->load->view("user/app/navbar");
		$this->load->view("user/hasil/index", $data);
		$this->load->view("user/app/footer");
		$this->load->view("user/hasil/js/index");
	}

	public function riwayat($id = null){
		if($id == null) redirect('user');

		$answer = $this->db->get_where('answer',['id'=>$id])->row_array();
		$question = $this->db->get_where('question',['id'=>$answer['question_id']])->row_array();
		$question_detail = $this->db->order_by('id','asc')->get_where('question_detail',['question_id'=>$question['id']])->result_array();

		$count_point_twk = 0;
		$count_point_tiu = 0;
		$count_point_tkp = 0;
						
		$count_point = [];
		$data['question_detail'] = $this->db
			->select("question_detail.*, (SELECT answer_detail.selected from answer_detail where answer_detail.answer_id = '$id' and answer_detail.question_detail_id = question_detail.id) as checked, $id as answer_id")
			->group_by('question_detail.id')
			->order_by('question_detail.id','asc')
			->get_where('question_detail',[
				'question_detail.question_id' => $question['id'],
			])
			->result_array();

		foreach ($data['question_detail'] as $key => $value) {
		    $choice = $this->db->order_by('id', 'ASC')->get_where('choice', ['question_detail_id' => $value['id']])->result_array();
		    $data['question_detail'][$key]['choice'] = $choice;

		    $data['question_detail'][$key]['point'] = 0;
		    
		    foreach ($choice as $value2) {
		        if ($value2['order'] == $value['checked']) {
		            $data['question_detail'][$key]['point'] = $value2['point'];
		            break;
		        }
		    }
		}


		foreach ($data['question_detail'] as $key => $value) {
			if($key+1 <= 30){
				$count_point_twk += $value['point'];
			}
			if($key+1 > 30 && $key+1 <= 65){
				$count_point_tiu += $value['point'];
			}
			if($key+1 > 65 && $key+1 <= 110){
				$count_point_tkp += $value['point'];
			}
		}

		$data['count_point'] = $count_point_twk + $count_point_tiu + $count_point_tkp;
		$kelulusan = 1;
		if($kelulusan == 1 && $count_point_twk < $question['pg_twk']){
			$kelulusan = 2;
		}
		if($kelulusan == 1 && $count_point_tiu < $question['pg_tiu']){
			$kelulusan = 2;
		}
		if($kelulusan == 1 && $count_point_tkp < $question['pg_tkp']){
			$kelulusan = 2;
		}
		$data['kelulusan'] = $kelulusan;

		$data['total_point'] = 0;
		foreach ($question_detail as $key => $value) {
			$choice = $this->db->order_by('point','desc')->get_where('choice',['question_detail_id'=>$value['id']])->row_array();
			$data['total_point'] += $choice ? $choice['point'] : 0;
		}

		$data['question'] = $this->db->get_where('question',['question.id'=>$answer['question_id']])->row_array();
		$data['question']['count_point_twk'] = $count_point_twk;
		$data['question']['count_point_tiu'] = $count_point_tiu;
		$data['question']['count_point_tkp'] = $count_point_tkp;

		$list_user = $this->db->get_where('user',['class_id'=>$this->session->userdata('class_id')])->result_array();

		$user_ids = array();
		foreach ($list_user as $user) {
		    $user_ids[] = $user['id'];
		}

		$data['answer'] = $this->db
	        ->select("question.pg_twk,question.pg_tiu,question.pg_tkp, answer.id as answer_id, answer.question_id, answer.user_id, answer.date, user.*")
			->join('question', 'question.id = answer.question_id','left')
			->join('user', 'user.id = answer.user_id','left')
        	->order_by('answer.id','desc')
        	->where_in('user.id',$user_ids)
	        ->get_where("answer",[
	        	'question_id'=>$answer['question_id'],
	        ])->result_array();

		// $data['answer'] = $this->db
	    //     ->select("question.pg_twk,question.pg_tiu,question.pg_tkp, answer.id as answer_id, answer.user_id, answer.date, user.*")
		// 	->join('question', 'question.id = answer.question_id','left')
		// 	->join('user', 'user.id = answer.user_id','left')
        // 	->order_by('answer.id','desc')
        // 	->where_in('user.id',$user_ids)
	    //     ->get_where("answer",[
	    //     	'question_id'=>$answer['question_id'],
	    //     ])->result_array();

	    foreach ($data['answer'] as $key => $value) {
			$count_point_twk = 0;
			$count_point_tiu = 0;
			$count_point_tkp = 0;
			$answer_id = $value['answer_id'];

	    	$count_point = $this->db
				->select("question_detail.*, (SELECT answer_detail.selected from answer_detail where answer_detail.answer_id = '$answer_id' and answer_detail.question_detail_id = question_detail.id) as checked, $answer_id as answer_id")
				->group_by('question_detail.id')
				->order_by('question_detail.id','asc')
				->get_where('question_detail',[
					'question_detail.question_id' => $value['question_id'],
				])
				->result_array();

			foreach ($count_point as $key2 => $value3) {
			    $choice = $this->db->order_by('id', 'ASC')->get_where('choice', ['question_detail_id' => $value3['id']])->result_array();
			    $count_point[$key2]['choice'] = $choice;

			    $count_point[$key2]['point'] = 0;
			    
			    foreach ($choice as $value2) {
			        if ($value2['order'] == $value3['checked']) {
			            $count_point[$key2]['point'] = $value2['point'];
			            break;
			        }
			    }
			}

			foreach ($count_point as $key2 => $value2) {
				if($key2+1 <= 30){
					$count_point_twk += $value2['point'];
				}
				if($key2+1 > 30 && $key2+1 <= 65){
					$count_point_tiu += $value2['point'];
				}
				if($key2+1 > 65 && $key2+1 <= 110){
					$count_point_tkp += $value2['point'];
				}
			}

			$kelulusan = "Lulus";
			if($kelulusan == "Lulus" && $count_point_twk < $value['pg_twk']){
				$kelulusan = "Tidak Lulus";
			}
			if($kelulusan == "Lulus" && $count_point_tiu < $value['pg_tiu']){
				$kelulusan = "Tidak Lulus";
			}
			if($kelulusan == "Lulus" && $count_point_tkp < $value['pg_tkp']){
				$kelulusan = "Tidak Lulus";
			}
			
			$data['answer'][$key]['count_point'] = $count_point_twk + $count_point_tiu + $count_point_tkp;
			$data['answer'][$key]['count_point_twk'] = $count_point_twk;
			$data['answer'][$key]['count_point_tiu'] = $count_point_tiu;
			$data['answer'][$key]['count_point_tkp'] = $count_point_tkp;
			$data['answer'][$key]['kelulusan'] = $kelulusan;
	    }
	    usort($data['answer'], function($a, $b){
	    	return $b['count_point'] - $a['count_point'];
	    });

		$this->load->view("user/app/header");
		$this->load->view("user/app/navbar");
		$this->load->view("user/riwayat/index", $data);
		$this->load->view("user/app/footer");
		$this->load->view("user/riwayat/js/index");
	}
	
}