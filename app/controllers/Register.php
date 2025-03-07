<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$authorization = $this->session->userdata('token');
	    if(!empty($authorization) || isset($authorization)) {
	      // $this->authMiddleware();
		}
	}

	public function index(){
		$this->load->view("auth/register");
	}

   public function authMiddleware(){
     $authorization = $this->session->userdata('token');
     $user_token = $this->db->get_where('users', [
         'token' => $authorization
     ])->row_array();

     if(!$user_token) {
        redirect("login");
     }
   }
}