<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
     	$this->session->unset_userdata('id');
     	$this->session->unset_userdata('bidang_id');
     	$this->session->unset_userdata('nama');
     	$this->session->unset_userdata('username');
     	$this->session->unset_userdata('password');
     	$this->session->unset_userdata('role');
     	$this->session->unset_userdata('last_login');
     	$this->session->unset_userdata('token');
     	
        redirect("login");
	}
}