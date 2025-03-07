<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header('Content-type: application/json');
class Login extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("Api/Security_model","model");
	}

	public function checkLogin(){
		$request = $this->model->checkLogin($this->input->post());
		echo json_encode($request);
	}
}