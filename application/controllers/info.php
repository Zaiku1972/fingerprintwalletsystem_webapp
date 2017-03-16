<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller
{
  function __construct()
   {
       // this is your constructor
       parent::__construct();
       $this->load->helper('form');
       $this->load->helper('url');
       $this->load->helper('url_helper');
       $this->load->model('info_model');
   }

  public function team()
  {
    $data['title']="Team Members";
    $this->load->view('info/team',$data);
  }

      public function contact_us()
      {
            if($_POST)
            {
                $email=$this->input->post('email_id');
                $subject=$this->input->post('subject');
                $message=$this->input->post('message');
                
                $result=$this->info_model->contact_us($email,$subject,$message);
                if($result == 1)
                {
                  $data['title']="Contact Us";
                  $data['contact_status']="We Will Get Back To You";
                  $data['contact_modal']=1;
                  $this->load->view('info/contact_us',$data);
                }else if($result ==0)
                {
                  $data['title']="Contact Us";
                  $data['contact_status']="Problem With Mailing Server,Try Again";
                  $data['contact_modal']=0;
                  $this->load->view('info/contact_us',$data);
                }
            }
            else
            {
              $data['title']="Contact Us";
              $this->load->view('info/contact_us',$data);
            }
     }


}

 ?>
