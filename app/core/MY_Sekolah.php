<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Sekolah extends MY_Controller
{
    private $access_id = '2';

    public function __construct()
    {
    	parent::__construct();
    	$this->initilaize();
    }

    public function initilaize()
    {
    	$headers = $this->input->request_headers();

        $Auth = $headers['Authorization']?? '';
        $token = str_replace('Bearer ','',$Auth);
        if(empty($Auth) || empty($token))
        {
            return $this->response([
                'status' => false,
                'message' => 'Token tidak sesuai'
            ]);
        }

        $get = $this->db->get_where('data_user',['token' => $token,'level_id' => $this->access_id])->row_array();
        if(!$get)
        {
            return $this->response([
                'status' => false,
                'message' => 'Unauthentication'
            ]);
        }
    }
}
