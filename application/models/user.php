<?php
//require_once 'vendor\autoload.php';


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model
{
  public function __construct()
  {
    $this -> load -> database();
  }

  function register_user ($userdata,$number)
  {
    // TODO implement conflicts. -- Done
    $this->db->where('phone_no', $number);
    $result=$this->db->update('users', $userdata);

    if($result){
      $error = $this -> db -> error();
      $val = array('error' => 1, 'error_message' => $error['message'],'res1'=> $result);
      return $val;
    }
    else{
      $val = array ('error' => 0);
      return $val;
    }
  }
  function check_email($email)
  {
    $where= array(
      'email' => $email
    );
    $this-> db -> select() -> from('users') -> where($where);
    $query = $this -> db ->get ();

    if($query -> first_row('array')['email'] == NULL)
    {
      return 1;
    }else{
      return 0;
    }

  }
  function check_num($number){
      $where= array(
        'phone_no'=>$number
      );
      $this-> db -> select() -> from('users') -> where($where);
      $query = $this -> db ->get ();
      $is_new_check= $query -> first_row('array')['is_new'];
      $sam = $query -> first_row('array')['phone_no'];

      if($sam && $is_new_check==0){
        return true;
      }else{
        return false;
      }
  }
  function randStrGen($len){
      $result = "";
      $chars = "abcdefghijklmnopqrstuvwxyz?!-0123456789";
      $charArray = str_split($chars);
      for($i = 0; $i < $len; $i++){
  	    $randItem = array_rand($charArray);
  	    $result .= "".$charArray[$randItem];
      }
      return $result;
  }

  function send_email($randstr,$u_email,$u_name){
      include_once "vendor/autoload.php";

      $text = "Thank You For Registration\n\n";
      $html = "<html>
            <head></head>
            <body>
                Your Password is :

            </body>
            </html>".$randstr;
      // This is your From email address
      $from = array('payhexa@studcops.com' => 'Pay Hexa');

      $to = array(
            $u_email=>$u_name
      );
      // Email subject
      $subject = 'Registration Success and Password';

      // Login credentials
      $username = 'azure_fba5f1f3ee0bfded072f4e26e603c400@azure.com';
      $password = 'g_oo_gle_g2';

      // Setup Swift mailer parameters
      $transport = Swift_SmtpTransport::newInstance('smtp.sendgrid.net', 587);
      $transport->setUsername($username);
      $transport->setPassword($password);
      $swift = Swift_Mailer::newInstance($transport);

      // Create a message (subject)
      $message = new Swift_Message($subject);

      // attach the body of the email
      $message->setFrom($from);
      $message->setBody($html, 'text/html');
      $message->setTo($to);
      $message->addPart($text, 'text/plain');

      // send message
      if ($recipients = $swift->send($message, $failures))
      {
          // This will let us know how many users received this message
          return 1;
      }else{
        return 0;
      }
  }

  function login($phone_number, $password)
  {
    $where = array(
      'phone_no' => $phone_number
    );

    $this -> db -> select () -> from('users') -> where ($where);
    $query = $this -> db -> get ();
    $password1=$query -> first_row('array')['password'];
    if ($password1 == $password)
      return $query -> first_row('array');

  }


function m_trans_cre($acc_bal,$amt,$ven_id,$f_num)
{
  $trans_file = fopen("file/file1.txt","r+")or die("Unable to die");
  $trans_id=fread($trans_file,filesize("file/file1.txt"));
  fclose($trans_file);

  $trans_id_new=$trans_id+1;

  if($trans_id=="Unable to die"){
    return false;
  }else{
    $userdata= array(
      'trans_id' => $trans_id_new,
      'trans_type' =>1,
      'phone_no' => $_SESSION['num'],
      'f_phone_no' => $f_num,
      'ven_id'=>$ven_id,
      'date'=>date("Y/m/d"),
      'time'=>date("h:i:sa"),
      'amount'=>$amt,
      'acc_bal_rem'=>$acc_bal
    );

    $trans_file1 = fopen("file/file1.txt","w") or die("Unable to die");
    fwrite($trans_file1,$trans_id_new);
    fclose($trans_file1);

    $query=$this -> db -> insert('trans',$userdata);

    if($query){
      $error_trans_cre="Transaction Log Created Successfully";
      return $error_trans_cre;
    }else{
      $error_trans_cre="Transaction Log Creation Failure";
      return $error_trans_cre;
    }

  }
}
function m_trans_crerev(){
  $trans_file = fopen("file/file1.txt","r+")or die("Unable to die");
  $trans_id=fread($trans_file,filesize("file/file1.txt"));
  fclose($trans_file);

  $trans_id_new=$trans_id-1;


  if($trans_id_new < $trans_id){
  $trans_file1 = fopen("file/file1.txt","w") or die("Unable to die");
  fwrite($trans_file1,$trans_id_new);
  fclose($trans_file1);
  return 1;
  }

  else {
  return 0;
  }
}
function m_trans_record($num){

  if($num == $_SESSION['num']){
    $where= array(
      'phone_no'=>$num
    );

    $this-> db -> select() -> from('trans') -> where($where);
    $query = $this-> db ->get();

    if($query -> first_row('array')['phone_no'] != NULL){
      return $query;
    }else{
      $error_trans_record="No Records to Display";
      return $error_trans_record;
    }
  }else{
    $error_trans_record="Something Went Wrong with No Verification";
    return $error_trans_record;
  }
}

function fund_transfer($f_num,$num,$amt)
{
  $where = array(
    'phone_no' => $num
  );
  $where2= array(
    'phone_no' => $f_num
  );
  //
  //$sql=$this -> db -> select () -> from('users') -> where ($where)->get_compiled_select();
  $this -> db -> select () -> from('users') -> where ($where);
  $query = $this-> db ->get();

  //$sql2=$this -> db -> select () -> from('users') -> where ($where2)->get_compiled_select();
  $this -> db -> select () -> from('users') -> where ($where2);
  $query2 = $this-> db ->get();

  if($query2 -> first_row('array')['phone_no'] != NULL)
  {
      //Debit The Amount
      $amt_eva= $query -> first_row('array')['acc_bal'];
      $amt_deduct=$amt_eva-$amt;
      if($amt_deduct <= 0)
      {
        return 1;
      }
      //Credit The Amount
      $amt_neva= $query2-> first_row('array')['acc_bal'];
      $amt_add=$amt+$amt_neva;
  }else{
    return 2;
  }

  $debit= array(
    'acc_bal'=> $amt_deduct
  );

  $credit = array(
    'acc_bal' => $amt_add
  );

  $this->db->where('phone_no', $num);
  $sql1=$this-> db ->set($debit) ->get_compiled_update('users');

  $this->db->where('phone_no',$f_num);
  $sql2=$this-> db ->set($credit) ->get_compiled_update('users');

  //Transaction Method Implementation
  $this->db->trans_start();
  $this->db->query($sql1);
  $this->db->query($sql2);
  $this->db->trans_complete();

  //Transaction Condition True or False
  if($this->db->trans_status() === FALSE)
  {
      $_SESSION['acc_bal']=$amt_eva;
      return 0;
  }else{
      $_SESSION['acc_bal']=$amt_deduct;
      return 3;
  }
}
function refresh_details($number)
{
  $where= array(
    'phone_no'=>$number
  );
  $this-> db -> select() -> from('users') -> where($where);
  $query = $this -> db ->get ();

  $_SESSION['name']=$query -> first_row('array')['name'];
  $_SESSION['u_level']=$query -> first_row('array')['u_level'];
  $_SESSION['email']=$query -> first_row('array')['email'];
  $_SESSION['acc_bal']=$query -> first_row('array')['acc_bal'];
  $_SESSION['profile_link']=$query -> first_row('array')['profile_link'];
}
function update_profile($profile_path)
{
  $where= array(
    'profile_link'=>$profile_path
  );
  $this->db->where('phone_no', $_SESSION['num']);
  $result=$this->db->update('users', $where);

  if($result)
  {
    return 1;
  }else{
    return 0;
  }

}
function m_edit_name($name)
{
  $profile= array(
    'name'=> $name
  );
  $this->db->where('phone_no', $_SESSION['num']);
  $result=$this->db->update('users', $profile);

  if($result)
  {
    return 1;
  }else{
    return 0;
  }

}

}
?>
