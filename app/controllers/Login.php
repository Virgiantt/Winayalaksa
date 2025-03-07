<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$authorization = $this->session->userdata('token');
	    if(!empty($authorization) || isset($authorization)) {
	      $this->authMiddleware();
		}
	}

	public function index(){
		$this->load->view("auth/login");
	}

   public function authMiddleware(){
     $authorization = $this->session->userdata('token');
     $user_token = $this->db->get_where('user', [
         'token' => $authorization
     ])->row_array();

     if(!$user_token) {
         $this->session->unset_userdata('id');
         $this->session->unset_userdata('bidang_id');
         $this->session->unset_userdata('nama');
         $this->session->unset_userdata('username');
         $this->session->unset_userdata('password');
         $this->session->unset_userdata('role');
         $this->session->unset_userdata('last_login');
         $this->session->unset_userdata('token');
        redirect("login");
     }else if($user_token['role'] == 2){
        redirect("user");
     }else if($user_token['role'] == 1){
        redirect("admin/statistik");
     }
   }
}