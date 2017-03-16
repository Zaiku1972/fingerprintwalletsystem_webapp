<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	 {
			 // this is your constructor
			 parent::__construct();
			 $this->load->helper('form');
			 $this->load->helper('url');
			 $this->load->helper('url_helper');
			 $this->load->model('news_model');
	 }

	public function index()
	{
		if(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin']==TRUE)
		{
				$data['acc_bal']=$_SESSION['acc_bal'];
				//Loading Daily News
				$data['news'] = $this->news_model->get_news();
        $data['title'] = 'Stud COPS|Welcome';

				$this -> load-> view('welcome_message',$data);
		}
		else {
				redirect(base_url().'users/login');
		}

	}

}
