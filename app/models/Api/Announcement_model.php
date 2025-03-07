<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Announcement_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
 
    public function index($params){
        if(isset($params['id'])){
            $id = $params['id'];
            $response = $this->db->query("SELECT * FROM announcement where id = $id order by id desc")->row_array();
        }else{
            $response = $this->db->query("SELECT * FROM announcement order by id desc")->result_array();
        }

        return $response;
    }

    public function add($params){
        $response = $this->db->insert("announcement",[
            "text" => $params['text'],
            "status" => $params['status'],
        ]);

        return $response;
    }

    public function update($params){
        $response = $this->db->update("announcement",[
            "text" => $params['text'],
            "status" => $params['status'],
        ],[
            "id" => $params['id']
        ]);

        return $response;
    }

    public function delete($params){
        $response = $this->db->delete("announcement",[
            'id' => $params['id']
        ]);

        return $response;
    }
}