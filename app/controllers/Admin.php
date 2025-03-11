<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require FCPATH . '/vendor/autoload.php';
use Dompdf\Dompdf;

class Admin extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		redirect('admin/dashboard');
	}

	public function dashboard(){
        $data['user'] = $this->db->get_where("user",['role'=>2])->num_rows();
        $data['class'] = $this->db->get("class")->num_rows();
        $data['exam'] = $this->db->get_where("question",['type' => 'exam'])->num_rows();
        $data['latihan'] = $this->db->get_where("question",['type' => 'practice'])->result_array();
        
        $data['class_data'] = $this->db->get("class")->result_array();
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/dashboard/index", $data);
		$this->load->view("admin/app/footer");
		$this->load->view("admin/dashboard/js/index");
	}

	public function statistik($id = null){
		if($id == null) redirect('admin');

        $access_question = $this->db->get_where("class",['id'=>$id])->row_array();
        $access_question = explode(',',$access_question['access_question']);
        $access_question = implode(',',$access_question);

        $data['question'] = $this->db->query("SELECT * FROM question WHERE ID IN($access_question) AND type = 'exam' ")->result_array();
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/statistik/index", $data);
		$this->load->view("admin/app/footer");
		$this->load->view("admin/statistik/js/index");
	}

	public function detail_statistik($id = null, $class = null, $answer_id = null){
		if($id == null || $class == null) redirect('admin');
		if($answer_id != null){
	        $this->db->delete("answer_detail",[
	            'answer_id' => $answer_id
	        ]);
	        $this->db->delete("answer",[
	            'id' => $answer_id
	        ]);
			redirect("admin/detail_statistik/$id/$class");	
		} 

        $data['question'] = $this->db->get_where("question",['id'=>$id])->row_array();
        
		$list_user = $this->db->get_where('user',['class_id'=>$class])->result_array();

		$user_ids = array();
		foreach ($list_user as $user) {
		    $user_ids[] = $user['id'];
		}

		if(count($user_ids) > 0){
			$data['answer'] = $this->db
		        ->select("question.pg_twk,question.pg_tiu,question.pg_tkp, answer.id as answer_id, answer.user_id, answer.date, user.*, answer.question_id")
				->join('question', 'question.id = answer.question_id','left')
				->join('user', 'user.id = answer.user_id','left')
	        	->order_by('answer.id','desc')
	        	->where_in('user.id',$user_ids)
		        ->get_where("answer",[
		        	'question_id'=>$id,
		        ])->result_array();
		}else{
			$data['answer'] = [];

		}

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

		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/detail_statistik/index", $data);
		$this->load->view("admin/app/footer");
		$this->load->view("admin/detail_statistik/js/index");
	}

	public function print($id = null, $class = null){
		if($id == null || $class == null) redirect('admin');

        $data['question'] = $this->db->get_where("question",['id'=>$id])->row_array();
        $data['class'] = $this->db->get_where("class",['id'=>$class])->row_array();

		$list_user = $this->db->get_where('user',['class_id'=>$class])->result_array();

		$user_ids = array();
		foreach ($list_user as $user) {
		    $user_ids[] = $user['id'];
		}

		$data['answer'] = $this->db
	        ->select("question.pg_twk,question.pg_tiu,question.pg_tkp, answer.id as answer_id, answer.user_id, answer.date, user.*, answer.question_id")
			->join('question', 'question.id = answer.question_id','left')
			->join('user', 'user.id = answer.user_id','left')
        	->order_by('answer.id','desc')
        	->where_in('user.id',$user_ids)
	        ->get_where("answer",[
	        	'question_id'=>$id,
	        ])->result_array();

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

		$pdf = $this->load->view("admin/print/index",$data,true);
      
       	$dompdf = new Dompdf();
		$dompdf->set_option('isRemoteEnabled', TRUE);
		$dompdf->loadHtml($pdf);
		$dompdf->setPaper('A4', 'potrait');
		$dompdf->render();

		$dompdf->stream('Hasil Tryout Seleksi Kemampuan Dasar.pdf',array('Attachment'=>0));
	}

	public function detail_latihan($id = null, $answer_id = null){
		if($id == null) redirect('admin');
		if($answer_id != null){
	        $this->db->delete("answer_detail",[
	            'answer_id' => $answer_id
	        ]);
	        $this->db->delete("answer",[
	            'id' => $answer_id
	        ]);
			redirect("admin/detail_latihan/$id");	
		} 

        $data['question'] = $this->db->get_where("question",['id'=>$id])->row_array();

		$data['answer'] = $this->db
	        ->select("question.pg_twk,question.pg_tiu,question.pg_tkp, answer.id as answer_id, answer.user_id, answer.date, user.*, answer.question_id")
			->join('question', 'question.id = answer.question_id','left')
			->join('user', 'user.id = answer.user_id','left')
        	->order_by('answer.id','desc')
	        ->get_where("answer",[
	        	'question_id'=>$id,
	        ])->result_array();

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

		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/detail_latihan/index", $data);
		$this->load->view("admin/app/footer");
		$this->load->view("admin/detail_latihan/js/index");
	}

	public function print_latihan($id = null){
		if($id == null) redirect('admin');

        $data['question'] = $this->db->get_where("question",['id'=>$id])->row_array();

		$data['answer'] = $this->db
	        ->select("question.pg_twk,question.pg_tiu,question.pg_tkp, answer.id as answer_id, answer.user_id, answer.date, user.*, answer.question_id")
			->join('question', 'question.id = answer.question_id','left')
			->join('user', 'user.id = answer.user_id','left')
        	->order_by('answer.id','desc')
	        ->get_where("answer",[
	        	'question_id'=>$id,
	        ])->result_array();

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

		$pdf = $this->load->view("admin/print_latihan/index",$data,true);
      
       	$dompdf = new Dompdf();
		$dompdf->set_option('isRemoteEnabled', TRUE);
		$dompdf->loadHtml($pdf);
		$dompdf->setPaper('A4', 'potrait');
		$dompdf->render();

		$dompdf->stream('Hasil Evaluasi Pembelajaran.pdf',array('Attachment'=>0));
	}

	public function kategori(){
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/kategori/index");
		$this->load->view("admin/app/footer");
		$this->load->view("admin/kategori/js/index");
	}

	public function pengumuman(){
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/pengumuman/index");
		$this->load->view("admin/app/footer");
		$this->load->view("admin/pengumuman/js/index");
	}

	public function user(){
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/user/index");
		$this->load->view("admin/app/footer");
		$this->load->view("admin/user/js/index");
	}

	public function class(){
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/class/index");
		$this->load->view("admin/app/footer");
		$this->load->view("admin/class/js/index");
	}

	public function soal(){
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/soal/index");
		$this->load->view("admin/app/footer");
		$this->load->view("admin/soal/js/index");
	}

	public function kelola_soal($id){
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/kelola_soal/index");
		$this->load->view("admin/app/footer");
		$this->load->view("admin/kelola_soal/js/index");
	}

	public function latihan(){
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/latihan/index");
		$this->load->view("admin/app/footer");
		$this->load->view("admin/latihan/js/index");
	}
	
// ---------------------------------------------------------------- E LEARNING NEW APPLICATION ----------------------------------------------------------------

	public function learnmain(){
		$data['user'] = $this->db->get_where("user",['role'=>2])->num_rows();
		$data['class'] = $this->db->get("learn_class")->num_rows();
		$data['lesson'] = $this->db->get("lesson")->num_rows();
		$data['modul'] = $this->db->get("modul")->num_rows();
		$data['materi'] = $this->db->get("chapter")->num_rows();
		$data['discuss'] = $this->db->get("discuss")->num_rows();
		$data['latihan'] = $this->db->get_where("question",['type' => 'practice'])->result_array();
		
		$data['class_data'] = $this->db->get("class")->result_array();
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/learnmain/index", $data);	
		$this->load->view("admin/app/footer");
		$this->load->view("admin/dashboard/js/index");
	}
	
    public function learnclass(){
		$this->load->view("admin/app/header");
		$this->load->view("admin/app/sidebar");
		$this->load->view("admin/app/navbar");
		$this->load->view("admin/learnmain/class");	
		$this->load->view("admin/app/footer");
	}
}