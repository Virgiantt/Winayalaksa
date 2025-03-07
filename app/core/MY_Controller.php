<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends CI_Controller {

   public function __construct(){
      parent::__construct();
      $this->authMiddleware();
   }

   public function authMiddleware(){
     $authorization = $this->session->userdata('token');
     // echo $authorization;die;
     if(!isset($authorization)) {
         $this->session->unset_userdata('id');
         $this->session->unset_userdata('bidang_id');
         $this->session->unset_userdata('nama');
         $this->session->unset_userdata('username');
         $this->session->unset_userdata('password');
         $this->session->unset_userdata('role');
         $this->session->unset_userdata('last_login');
         $this->session->unset_userdata('token');
         redirect("login");
      }else {

         $user_token = $this->db->get_where('user', [
             'token' => $authorization
         ])->row_array();

        if(!$user_token) {
           redirect("login");
        }else if($this->uri->segment(1) != "api" && $this->uri->segment(1) != "user" ){
            if($user_token['role'] == 2)
               redirect("user");
        }else if($this->uri->segment(1) != "api" && $this->uri->segment(1) != "admin" ){
            if($user_token['role'] == 1)
               redirect("admin/statistik");
        }
      }
   }

}

/* End of file MY_Controller.php */
