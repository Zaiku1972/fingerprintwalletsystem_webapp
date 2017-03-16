<?php
  class Info_model extends CI_Model
  {
    public function __construct()
    {
            $this->load->database();
    }
    public function contact_us($email,$subject,$message)
    {
        $userdata= array(
          'email'=>$email,
          'subject'=>$subject,
          'message'=>$message
        );
        $result=$this->db->insert('contact_list',$userdata);
        if($result)
        {
          return 1;
        }else{
          return 0;
        }
    }

  }
?>
