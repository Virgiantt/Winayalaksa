<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header('Content-type: application/json');
class Answer extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model("Api/Answer_model","model");
	}

	public function index(){
		$request = $this->model->index($this->input->get());
		echo json_encode($request);
	}

	public function add(){
		$request = $this->model->add($this->input->post());
		echo json_encode($request);
	}

	public function update(){
		$request = $this->model->update($this->input->post());
		echo json_encode($request);
	}

	public function delete(){
		$request = $this->model->delete($this->input->post());
		echo json_encode($request);
	}
}