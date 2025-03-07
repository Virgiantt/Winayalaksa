<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
 
    public function index($params){
        if(isset($params['id'])){
            $response = $this->db->query("SELECT * FROM user where id = $params[id] order by id desc")->row_array();
        }else{
            $response = $this->db->query("SELECT * FROM user order by id desc")->result_array();
        }

        return $response;
    }

    public function add($params){
        $response = $this->db->insert("user",[
            "name" => $params['name'],
            "username" => $params['username'],
            "class_id" => $params['class_id'],
            "email" => $params['email'],
            "phone" => $params['phone'],
            "gender" => $params['gender'],
            "address" => $params['address'],
            "role" => $params['role'],
            "password" => password_hash($params['password'],PASSWORD_DEFAULT) ,
            "token" => password_hash($params['username'],PASSWORD_DEFAULT).".h4R1".password_hash($params['password'],PASSWORD_DEFAULT) ,
        ]);

        return $response;
    }

    public function update($params){
        $response = $this->db->update("user",[
            "name" => $params['name'],
            "username" => $params['username'],
            "email" => $params['email'],
            "phone" => $params['phone'],
            "gender" => $params['gender'],
            "class_id" => $params['class_id'],
            "address" => $params['address'],
            "role" => $params['role'],
            "password" => password_hash($params['password'],PASSWORD_DEFAULT) ,
            "token" => password_hash($params['username'],PASSWORD_DEFAULT).".h4R1".password_hash($params['password'],PASSWORD_DEFAULT) ,
        ],[
            "id" => $params['id']
        ]);

        return $response;
    }

    public function delete($params){
        $answer_id = $this->db->get_where('answer',['user_id'=>$params['id']])->row_array();
        $this->db->delete("answer",[
            'user_id' => $params['id']
        ]);
        if($answer_id){
            $this->db->delete("answer_detail",[
                'answer_id' => $answer_id['id']
            ]);
        }
        $response = $this->db->delete("user",[
            'id' => $params['id']
        ]);

        return $response;
    }
}
