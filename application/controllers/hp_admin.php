<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Hp_admin extends CI_Controller
{

        public function __construct()
        {
                parent::__construct();
                $this->load->model('hp_model');
                $this->load->model('user');
                $this->load->helper('url_helper');
        }

        public function dash_board()
        {
            if(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])
            {
                if($_SESSION['u_level']==2)
                {
                    $data['title']="Admin|Stud COPS";
                    $this->load->view('hp_admin/home',$data);
                }else{
                  redirect(base_url());
                }
            }else{
              redirect(base_url().'users/login');
            }
        }
        public function hello()
        {
            $this->load->view('hp_admin/home');
        }

}
?>
