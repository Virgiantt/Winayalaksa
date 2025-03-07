<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header('Content-type: application/json');
class Register extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("Api/Security_model","model");
	}

	public function index(){
		$request = $this->model->register($this->input->post());
		echo json_encode($request);
	}
}