<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Question_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
 
    public function index($params){
        if(isset($params['id'])){
            $id = $params['id'];
            $response = $this->db->query("SELECT question.*,answer.id as answer, (select count(question_detail.id) FROM question_detail where question_detail.question_id = question.id) as count_question FROM question LEFT JOIN answer ON answer.question_id = question.id where question.id = $id order by question.id desc")->row_array();
        }elseif(isset($params['status'])){
            $status = $params['status'];
            $type = $params['type'];

            if($type == 'exam'){
                $class_id = $this->session->userdata('class_id');
                $class = $this->db->get_where("class",['id'=>$class_id])->row_array()['access_question'];
                $response = $this->db->query("
                    SELECT question.*,answer.id as answer_id, (select count(question_detail.id) FROM question_detail where question_detail.question_id = question.id) as count_question 
                    FROM question 
                    LEFT JOIN answer ON answer.question_id = question.id 
                    where question.type = '$type' 
                    and question.status = '$status'
                    and question.id in($class)
                    group by question.id 
                    order by question.id desc
                ")->result_array();
            }else{
                $response = $this->db->query("
                    SELECT question.*,answer.id as answer, (select count(question_detail.id) FROM question_detail where question_detail.question_id = question.id) as count_question 
                    FROM question 
                    LEFT JOIN answer ON answer.question_id = question.id 
                    where question.type = '$type' 
                    and question.status = '$status'
                    group by question.id 
                    order by question.id desc
                ")->result_array();
            }
        }elseif(isset($params['type'])){
            $type = $params['type'];
            $response = $this->db->query("SELECT question.*,answer.id as answer_id FROM question LEFT JOIN answer ON answer.question_id = question.id where question.type = '$type' group by question.id order by question.id desc")->result_array();

            foreach ($response as $key => $value) {
                $count_point_twk = 0;
                $count_point_tiu = 0;
                $count_point_tkp = 0;
                $count_point = $this->db->order_by('id','asc')->get_where('question_detail',['question_id' => $value['id']])->result_array();

                foreach ($count_point as $key2 => $value2) {
                    $choice = $this->db->order_by('point','desc')->get_where('choice',['question_detail_id'=>$value2['id']])->row_array();
                    if($key2+1 <= 30){
                        $count_point_twk += $choice['point'];
                    }
                    if($key2+1 > 30 && $key2+1 <= 65){
                        $count_point_tiu += $choice['point'];
                    }
                    if($key2+1 > 65 && $key2+1 <= 110){
                        $count_point_tkp += $choice['point'];
                    }
                }

                $response[$key]['count_twk'] = $count_point_twk;
                $response[$key]['count_tiu'] = $count_point_tiu;
                $response[$key]['count_tkp'] = $count_point_tkp;
            }
        }else{
            $response = $this->db->query("SELECT question.*,answer.id as answer FROM question LEFT JOIN answer ON answer.question_id = question.id group by question.id order by question.id desc")->result_array();
        }

        return $response;
    }

    public function add($params){
        $category = $this->db->get('category')->result_array();

        $pg_tkp = 0;
        $pg_twk = 0;
        $pg_tiu = 0;

        foreach ($category as $value) {
            if($value['name'] == 'TKP') $pg_tkp = $value['pg'];

            if($value['name'] == 'TWK') $pg_twk = $value['pg'];

            if($value['name'] == 'TIU') $pg_tiu = $value['pg']; 

        }
        
        $response = $this->db->insert("question",[
            "title" => $params['title'],
            "time" => $params['time'],
            "status" => $params['status'],
            "pg_tkp" => $pg_tkp,
            "pg_twk" => $pg_twk,
            "pg_tiu" => $pg_tiu,
            "type" => $params['type'],
            "description" => $params['description'],
        ]);

        return $response;
    }

    public function update($params){
        $response = $this->db->update("question",[
            "title" => $params['title'],
            "time" => $params['time'],
            "status" => $params['status'],
            "description" => $params['description'],
            "pg_twk" => $params['pg_twk'],
            "pg_tiu" => $params['pg_tiu'],
            "pg_tkp" => $params['pg_tkp'],
        ],[
            "id" => $params['id']
        ]);

        return $response;
    }

    public function status($params){
        $data = $this->db->get_where("question",['id'=>(int)$params['id']])->row_array();
        $response = $this->db->update("question",[
            "status" => $data['status'] == 1 ? 0 : 1,
        ],[
            "id" => $params['id']
        ]);

        return $response;
    }

    public function delete($params){
        $question_detail = $this->db->get_where('question_detail',['question_id'=>$params['id']])->row_array();
        
        $this->db->delete("answer",[
            'question_id' => $params['id']
        ]);
        if($question_detail){
            $this->db->delete("choice",[
                'question_detail_id' => $question_detail['id']
            ]);
        }
        if($question_detail){
            $this->db->delete("answer_detail",[
                'question_detail_id' => $question_detail['id']
            ]);
        }
        
        $this->db->delete("question_detail",[
            'question_id' => $params['id']
        ]);
        $this->db->delete("question",[
            'id' => $params['id']
        ]);

        return true;
    }
}