<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}

   public function index(){
		$data['announcement'] = $this->db->get('announcement')->row_array();
		$this->load->view("user/app/header");
		$this->load->view("user/app/navbar");
		$this->load->view("dash/index",$data);
		$this->load->view("user/app/footer");
		$this->load->view("user/soal/js/index");
	}
}
