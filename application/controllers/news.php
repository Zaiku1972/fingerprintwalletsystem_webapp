<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class News extends CI_Controller
{
        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->model('user');
                $this->load->helper('form');
                $this->load->helper('url_helper');
        }

        public function index()
        {
          if(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])
          {
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'News archive';
                $this->load->view('welcome_message', $data);
          }else{
            redirect(base_url().'users/login');
          }
        }

        public function view($slug = NULL)
        {
          if(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])
          {
            $data['news_item'] = $this->news_model->get_news($slug);
            if (empty($data['news_item']))
            {
                    show_404();
            }

            $data['title'] = $data['news_item']['title'];
            $this->load->view('news/view', $data);

          }else{
            redirect(base_url().'users/login');
          }
        }

        public function create()
        {
          if(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])
          {
              if($_SESSION['u_level']==2)
              {
                  if($_POST)
                  {
                      $this->load->helper('form');
                      $data['title']="Stud COPS|News";
                      $subject=$this->input->post('title');
                      $text=$this->input->post('text');

                      if($subject!=NULL && $text !=NULL)
                      {
                          $result=$this->news_model->set_news($subject,$text);
                          if($result == 1)
                          {
                            $data['title']="Stud COPS|Create News";
                            $data['news_error']="Added News Successfully";
                            $this->load->view('news/create',$data);
                          }else if ($result == 0)
                          {
                            $data['title']="Stud COPS|Create News";
                            $data['news_error']="Failed to Add News";
                            $this->load->view('news/create',$data);
                          }
                      }else{
                        $data['news_error']="Something is Wrong";
                        $data['title']="Stud COPS|Create News";
                        $this->load->helper('form');
                        $this->load->view('news/create',$data);
                      }
                    }else{
                      //$data['news_error']="Something is Wrong";
                      $data['title']="Stud COPS|Create News";
                      $this->load->helper('form');
                      $this->load->view('news/create',$data);
                    }
                }else{
                  redirect(base_url());
              }
          }else{
            redirect(base_url().'users/login');
          }
        }

        public function view_m($slug = NULL)
        {
          if(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])
          {
            $data['news_item'] = $this->news_model->get_news($slug);
            if (empty($data['news_item']))
            {
                    show_404();
            }

            $data['title'] = $data['news_item']['title'];
            $this->load->view('news/edit_n', $data);

          }else{
            redirect(base_url().'users/login');
          }
        }
        public function edit_news()
        {
          if(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])
          {
              if($_SESSION['u_level']==2)
              {
                  if($_POST)
                  {
                      $this->load->helper('form');
                      $subject=$this->input->post('title');
                      $text=$this->input->post('text1');
                      $id=$this->input->post('text2');
                      if($subject!=NULL && $text !=NULL && $id !=NULL)
                      {
                          $result=$this->news_model->edit_news($subject,$text,$id);
                          if($result == 1)
                          {
                            $data['title']="Edit News";
                            $data['news'] = $this->news_model->get_news();
                            $data['newsp_error']=1;
                            $data['news_error']="Edited News Successfully";
                            $this->load->view('news/edit',$data);
                          }else if ($result == 0)
                          {
                            $data['title']="Edit News";
                            $data['news'] = $this->news_model->get_news();
                            $data['newsp_error']=1;
                            $data['news_error']="Failed to Edit News";
                            $this->load->view('news/edit',$data);
                          }
                      }else{
                        $data['title']="Edit News";
                        $data['news'] = $this->news_model->get_news();
                        $data['newsp_error']=1;
                        $data['news_error'] ="Something is Empty";
                        $this->load->helper('form');
                        $this->load->view('news/edit',$data);
                      }
                    }else{
                      $data['title']="Edit News";
                      $data['news'] = $this->news_model->get_news();
                      $data['newsp_error']=1;
                      $this->load->view('news/edit',$data);
                    }
              }else{
                  redirect(base_url());
              }
         }else{
            redirect(base_url().'users/login');
          }
      }

}
?>
