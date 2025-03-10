<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main_page extends MY_Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$data['announcement'] = $this->db->get('announcement')->row_array();
        $this->db->select('main_page.*');
        $this->db->from('main_page');
        $this->db->join('mp_access', 'mp_access.mainpage_id = main_page.id','left');
        $this->db->join('user', 'user.jabatan_id = mp_access.jabatan_id','left');
        $this->db->where('user.id', $this->session->userdata('id'));
        $data['title'] = $this->db->get()->result();
		$this->load->view("user/app/header");
		$this->load->view("user/app/navbar");
		$this->load->view("home/home",$data);
		$this->load->view("user/app/footer");
	}
}