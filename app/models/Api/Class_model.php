<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
 
    public function index($params){
        if(isset($params['id'])){
            $response = $this->db->query("SELECT * FROM class where id = $params[id] order by id desc")->row_array();
        }else{
            $response = $this->db->query("SELECT * FROM class order by id desc")->result_array();
        }

        return $response;
    }

    public function add($params){
        $access_question = '';
        foreach($params['access_question'] as $key => $val){
            $access_question .= $key == 0 ? $val : ','.$val;
        }

        $response = $this->db->insert("class",[
            "name" => $params['name'],
            "access_question" => $access_question,
        ]);

        return $response;
    }

    public function update($params){
        $access_question = '';
        foreach($params['access_question'] as $key => $val){
            $access_question .= $key == 0 ? $val : ','.$val;
        }

        $response = $this->db->update("class",[
            "name" => $params['name'],
            "access_question" => $access_question,
        ],[
            "id" => $params['id']
        ]);

        return $response;
    }

    public function delete($params){
        $response = $this->db->delete("class",[
            'id' => $params['id']
        ]);

        return $response;
    }
}
