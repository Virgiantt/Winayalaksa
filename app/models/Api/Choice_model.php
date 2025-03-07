<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Choice_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
 
    public function index($params){
        if(isset($params['id'])){
            $id = $params['id'];
            $response = $this->db->query("SELECT * FROM choice where id = $id order by id desc")->row_array();
        }elseif(isset($params['question_detail_id'])){
            $question_detail_id = $params['question_detail_id'];
            $response = $this->db->query("SELECT * FROM choice where question_detail_id = $question_detail_id order by id desc")->result_array();
        }else{
            $response = $this->db->query("SELECT * FROM choice order by id desc")->result_array();
        }

        return $response;
    }

    public function add($params){
        $response = $this->db->insert("choice",[
            "question_detail_id" => $params['question_detail_id'],
            "order" => $params['order'],
            "point" => $params['point'],
        ]);

        return $response;
    }

    public function update($params){
        $response = $this->db->update("choice",[
            "question_detail_id" => $params['question_detail_id'],
            "order" => $params['order'],
            "point" => $params['point'],
        ],[
            "id" => $params['id']
        ]);

        return $response;
    }

    public function delete($params){
        $response = $this->db->delete("choice",[
            'id' => $params['id']
        ]);

        return $response;
    }
}