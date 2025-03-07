<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Security_model extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function checkLogin($params){
        $this->form_validation->set_rules("username","Username","required");
        $this->form_validation->set_rules("password","Password","required");

        if ($this->form_validation->run()) {
            $getUser = $this->db->get_where("user",[
                'username' => $params['username']
            ])->row_array();
            if($getUser){
                $checkPassword = password_verify($params['password'], $getUser['password']);
                if($checkPassword){
                    $response = [
                        "id" => $getUser['id'],
                        "name" => $getUser['name'],
                        "username" => $getUser['username'],
                        "email" => $getUser['email'],
                        "phone" => $getUser['phone'],
                        "gender" => $getUser['gender'],
                        "address" => $getUser['address'],
                        "password" => $getUser['password'],
                        "role" => $getUser['role'],
                        "token" => $getUser['token'],
                        "class_id" => $getUser['class_id'],
                    ];
                    $this->session->set_userdata($response);
                }else{
                    $response = "Password salah";
                }
            }else{
                $response = "Username tidak ditemukan";
            }
        }else{
         $response = validation_errors();
        }

        return $response;
    }

    public function register($params){
        $response = $this->db->insert("user",[
            "name" => $params['name'],
            "username" => $params['username'],
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

}