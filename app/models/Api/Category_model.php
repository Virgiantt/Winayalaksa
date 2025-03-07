<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
 
    public function index($params){
        if(isset($params['id'])){
            $id = $params['id'];
            $response = $this->db->query("SELECT * FROM category where id = $id order by id desc")->row_array();
        }else{
            $response = $this->db->query("SELECT * FROM category order by id desc")->result_array();
        }

        return $response;
    }

    public function add($params){
        $response = $this->db->insert("category",[
            "name" => $params['name'],
            "pg" => $params['pg'],
        ]);

        return $response;
    }

    public function update($params){
        $response = $this->db->update("category",[
            "name" => $params['name'],
            "pg" => $params['pg'],
        ],[
            "id" => $params['id']
        ]);

        return $response;
    }

    public function delete($params){
        $response = $this->db->delete("category",[
            'id' => $params['id']
        ]);

        return $response;
    }
}