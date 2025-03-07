<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Answer_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
 
    public function index($params){
        if(isset($params['id'])){
            $id = $params['id'];
            $response = $this->db->query("SELECT * FROM answer where id = $id order by id desc")->row_array();
        }elseif(isset($params['user_id'])){
            $user_id = $params['user_id'];
            $response = $this->db->query("SELECT * FROM answer where user_id = $user_id order by id desc")->result_array();
        }elseif(isset($params['question_id'])){
            $question_id = $params['question_id'];
            $response = $this->db->query("SELECT * FROM answer where question_id = $question_id order by id desc")->result_array();
        }elseif(isset($params['question_detail_id'])){
            $question_detail_id = $params['question_detail_id'];
            $response = $this->db->query("SELECT * FROM answer where question_detail_id = $question_detail_id order by id desc")->result_array();
        }else{
            $response = $this->db->query("SELECT * FROM answer order by id desc")->result_array();
        }

        return $response;
    }

    public function add($params){
        $response = $this->db->insert("answer",[
            "user_id" => $params['user_id'],
            "question_id" => $params['question_id'],
            "question_detail_id" => $params['question_detail_id'],
            "choice_id" => $params['choice_id'],
            "selected" => $params['selected'],
        ]);

        return $response;
    }

    public function update($params){
        $question_detail = $this->db->get_where('question_detail',['id' => $params['question_detail_id']])->row_array();
        $choice = $this->db->get_where('choice',['question_detail_id' => $params['question_detail_id'], 'order' => $params['choice_order']])->row_array();
        $question = $this->db->get_where('question',['id' => $question_detail['question_id']])->row_array();

        $answer = $this->db->get_where('answer',['user_id' => $this->session->userdata('id'), 'question_id' => $question['id'], 'id'=>$params['answer_id']])->row_array();
        
        $answer_detail = $this->db->get_where('answer_detail',['answer_id' => $answer['id'], 'question_detail_id' => $question_detail['id']])->row_array();

        if($answer_detail != null){
            $this->db->update('answer_detail',[
                'choice_id'=>$choice['id'],
                'selected'=>$choice['order']
            ],[
                'id'=>$answer_detail['id']
            ]);
        }else{
            $this->db->insert('answer_detail',[
                'answer_id'=>$answer['id'],
                'question_detail_id'=>$params['question_detail_id'],
                'choice_id'=>$choice['id'],
                'selected'=>$choice['order']
            ]);
        }

        return true;
    }

    public function delete($params){
        $response = $this->db->delete("answer",[
            'id' => $params['id']
        ]);

        return $response;
    }
}