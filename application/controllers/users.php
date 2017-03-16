<?php
require_once 'vendor\autoload.php';
use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Blob\Models\CreateContainerOptions;
use MicrosoftAzure\Storage\Blob\Models\PublicAccessType;
use MicrosoftAzure\Storage\Common\ServiceException;


defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

  function __construct()
   {
       // this is your constructor
       parent::__construct();
       $this->load->helper('form');
       $this->load->model('user');
       $this->load->helper('url');
       $this->load->helper('url_helper');
   }

  function register() {
    if(!isset($_SESSION['is_loggedin']) || !$_SESSION['is_loggedin']){
        if($_POST)
        {
          $phone_no= $this-> input -> post('phone_no');
          $check_num=$this->user->check_num($phone_no);

        if($check_num){
          $_SESSION['num_check']=1;
          $_SESSION['num'] = $phone_no;
          redirect(base_url().'users/register2');
        }
        else{
              $_SESSION['num_check']=0;
              $this -> load -> helper('form');
              $data ['title'] = 'Register';
              $data['error_register1']="Already Registered or Phone Number Not Found";
              $this -> load -> view ('user/register',$data);
             }
        }
        else{
              $_SESSION['num_check']=0;
              $this -> load -> helper('form');
              $data ['title'] = 'Register';
              $this -> load -> view ('user/register',$data);
        }
    }else{
      redirect(base_url());
    }
  }

  function register2(){

      if(isset($_SESSION['num_check']) && $_SESSION['num_check']==1)
      {
        if ($_POST)
        {
            $randstr = $this-> user->randStrGen(10);
            $userdata= array(
            'name'=>$this-> input ->post('name'),
            'email'=>$this -> input -> post('email'),
            'password'=>$randstr,
            'is_new' =>1,
            'u_level'=>1
            );

            $phone_no= $_SESSION['num'];
            $email_check= $this->user->check_email($userdata['email']);
            if($email_check == 1)
            {
                $val=$this-> user ->register_user($userdata,$phone_no);
                if($val['error'] == 1)
                {
                    $_SESSION['num_check']=0;
                    $send_email=$this-> user ->send_email($randstr,$userdata['email'],$userdata['name']);
                    if($send_email == 1)
                    {
                      $data['email']="email sent successfully";
                      $this->load->view('user/reg_success',$data);
                    }
                    else if($send_email == 0){
                      $data['email']="Couldnot Send Email";
                      $data['temp_pass']=$randstr;
                      $this->load->view('user/reg_success',$data);
                    }
                }
                else if($val['error'] == 0)
                {
                  $this -> load -> helper('form');
                  $data ['message'] = "Something Went Wrong";
                  $this -> load -> view ('user/register2',$data);
                }
            }else if($email_check == 0){
              $this -> load -> helper('form');
              $data ['message'] = "Email ALready Exist";
              $this -> load -> view ('user/register2',$data);
            }else{
              $this -> load -> helper('form');
              $data ['message'] = "Email Module Error";
              $this -> load -> view ('user/register2',$data);
            }
        }
        else{
              $this -> load -> helper('form');
              $data ['title'] = 'Register';
              $this -> load -> view ('user/register2');
        }
    }
    else{
      redirect('users/register');
    }
}

  function login()
  {
    if (!isset($_SESSION['is_loggedin']) || !$_SESSION['is_loggedin']  )
    {
      $this -> load -> helper('form');
      $data['title'] = 'Login';
      $data['error'] = 0;

      if ($_POST)
      {
        $this -> load -> model('user');
        $phone_number = $this -> input -> post ('phone_number', true);
        $password = $this -> input -> post ('password', true);
        $user = $this -> user -> login ($phone_number, $password);

        if (!$user)
        {
          $data['title'] = 'Login';
          $data['error'] = "Incorrect Password Or Number Not Registered";
          $_SESSION['is_loggedin'] = FALSE;
          $this -> load -> view ('user/login', $data);
        }

        else
        {
          $_SESSION['num'] = $user['phone_no'];
          $_SESSION['acc_bal'] = $user['acc_bal'];
          $_SESSION['is_loggedin'] = TRUE;
          $_SESSION['first_login'] = $user['is_new'];
          $_SESSION['name']= $user['name'];
          $_SESSION['email']=$user['email'];
          $_SESSION['u_level']=$user['u_level'];
          $_SESSION['profile_link']=$user['profile_link'];
          redirect(base_url());
        }
      }
      else
      {
        $data['title'] = 'Login';
        $this -> load -> view ('user/login', $data);
      }
    }
    else
    {
      $data['title'] = 'Logged In';
      redirect(base_url());
    }

 }
 function trans_record()
 {
   if(isset($_SESSION['is_loggedin']) || $_SESSION['is_loggedin'])
   {


       $data['title']="Record|Fund Transfer";
       $num=$_SESSION['num'];
       $rec=$this->user->m_trans_record($num);

       if($rec != "No Records to Display" && $rec !="Something Went Wrong with No Verification"){
        $data = array(
         'rec' => $rec,
         'trans_error'=>1
        );
        $data['title']="Record|Fund Transfer";
        $this-> load -> view('user/c_trans_record',$data);
       }else if($rec == "Something Went Wrong with No Verification"){

         $this-> load -> view ('user/c_trans_record',$data);

       }else if($rec="No Records to Display"){

         $data['trans_error']="No Records to Display";
         $this-> load -> view('user/c_trans_record',$data);

       }else{
         $data['trans_error']="Something Went Wrong";
         $this->load->view('user/c_trans_record',$data);
       }
   }else{
     redirect(base_url().'users/login');
   }
 }
 function c_fund_transfer()
 {
   if(isset($_SESSION['is_loggedin']) || $_SESSION['is_loggedin'])
   {
      if($_POST)
      {
         $f_num= $this-> input ->post('friend_number');
         $amt= $this-> input -> post('amount_transfer');
         $data['title']="Fund Transfer";
         $num=$_SESSION['num'];
         $ven_id=1001;

           if($f_num != $num )
           {
             $result=$this-> user ->fund_transfer($f_num,$num,$amt);
             if($result == 1 )
             {
               $data['trans_status']="Required Fund Not Available";
               $this->load->view('user/c_fund_transfer',$data);
             }else if($result == 2 ){
               $data['trans_status']="Invalid Friend's Number";
               $this->load->view('user/c_fund_transfer',$data);
             }else if($result == 0){
               $data['trans_status']="Transaction Failed Somehow, Amount Reversed";
               $this->load->view('user/c_fund_transfer',$data);
             }else if($result == 3){
               $trans_log = $this-> user ->m_trans_cre($_SESSION['acc_bal'],$amt,$ven_id,$f_num);
               if($trans_log == "Transaction Log Created Successfully")
               {
               $data['trans_status']="Fund Successfully Transferred";
               $this->load->view('user/c_fund_transfer',$data);
               }else{
               $data['trans_status']="Transaction Log Creation Failure";
               //$this -> user ->m_fund_transfer_rev($f_num,$num,$amt); Need to be Implemented.
               $this-> user -> m_trans_crerev();
               $this->load->view('user/c_fund_transfer',$data);
               }
             }
          }else{
            $data['trans_status']="You Cannot Send Money To Yourself";
            $this->load->view('user/c_fund_transfer',$data);
          }
      }else{
            $this -> load -> helper('form');
            $data ['title'] = 'Fund Transfer';
            $this -> load -> view ('user/c_fund_transfer',$data);
      }
    }else{
      redirect(base_url().'users/login');
    }
}

function profile(){
  if(isset($_SESSION['is_loggedin']) || $_SESSION['is_loggedin'])
  {
            //Copying Data From Gobal Variable

            $this->user->refresh_details($_SESSION['num']);
            $data['title']="Profile|Stud COPS";
            $data['name']=$_SESSION['name'];
            $data['num']=$_SESSION['num'];
            $data['email']=$_SESSION['email'];
            $data['acc_bal']=$_SESSION['acc_bal'];
            $data['u_level']=$_SESSION['u_level'];
            if($_SESSION['u_level'] == 1)
            {
              $data['u_level']="Customer";
            }
            else if($_SESSION['u_level'] == 2)
            {
              $data['u_level']="Website Admin";
            }

            $this-> load ->view('user/profile',$data);

  }else{
    redirect(base_url().'users/login');
  }
}
function edit_profile(){
  if(isset($_SESSION['is_loggedin']) || $_SESSION['is_loggedin'])
  {
    if($_POST)
    {
      $this -> load -> helper('form');
      $this -> load -> helper('url');
      $name=$this->input->post('name');

      $data ['title'] = 'Edit Profile';
      if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != NULL)
      {
          $connectionString="DefaultEndpointsProtocol=http;AccountName=hexaprofile;AccountKey=19FMw31ZPgCoJ0roAXfjj0GFZX9Z3AQeuPd4rO57xZhH8F2aU+j7rks3KLm/SNAXQmzsDgw723pPZ4nXjiBZyw==";
          $blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

          $result1=$_FILES['file']['tmp_name'];
          $content = fopen($result1, "r");;
          $blob_name = $_SESSION['num'].'.jpg';
          try {
              $blobRestProxy->createBlockBlob("mycontainer", $blob_name, $content);
              $profile_path="https://hexaprofile.blob.core.windows.net/mycontainer/".$blob_name;
              $result=$this->user->update_profile($profile_path);
              if($result ==1)
              {
                $data['edit_profile']="Updated Successfully";
              }else if($result == 0){
                $data['edit_profile']="Couldnt Update Profile Picture";
              }else{
                $data['edit_profile']="Something Went Wrong";
              }
          }
          catch(ServiceException $e){
              $code = $e->getCode();
              $error_message = $e->getMessage();
              $data['edit_profile']="Couldnt Update Profile Picture";
          }
      }

      if($name != NULL)
      {
        $result=$this->user->m_edit_name($name);
        if($result == 1)
        {
          $data['edit_name']="Updated Name Successfully";
        }else if($result == 0)
        {
          $data['edit_name']="Couldnt Update Name Field";
        }
      }
      $this-> load -> view('user/edit_profile',$data);
    }
    else
    {
          $this -> load -> helper('form');
          $data ['title'] = 'Edit Profile';
          $this -> load -> view ('user/edit_profile',$data);
    }
  }else{
    redirect(base_url().'users/login');
  }
}
function test()
{
  $this->load->view('user/testing');
}
 function logout ()
 {
   $data['title'] = 'logged out';
   $this -> session -> sess_destroy();
   redirect (base_url());
 }

}
?>
