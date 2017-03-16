<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function get_news($slug = FALSE)
        {
              if ($slug === FALSE)
              {
                      $query = $this->db->get('news');
                      return $query->result_array();
              }

              $query = $this->db->get_where('news', array('slug' => $slug));
              return $query->row_array();
        }
        public function set_news($subject,$text)
        {
            $this->load->helper('url');

            $slug = url_title($subject, 'dash', TRUE);

            $data = array(
                'title' => $subject,
                'slug' => $slug,
                'posted_by'=>$_SESSION['name'],
                'text' => $text,
                'date'=>date("Y/m/d"),
                'time'=>date("h:i:sa")
            );

            $result=$this->db->insert('news', $data);
            if($result)
            {
              return 1;
            }else{
              return 0;
            }
        }
        public function edit_news($subject,$text,$text2)
        {
           $this->load->helper('url');
            $slug = url_title($subject, 'dash', TRUE);
            $data = array(
                'title' => $subject,
                'slug' => $slug,
                'posted_by'=>$_SESSION['name'],
                'text' => $text
            );

            $this->db->where('id', $text2);
            $result=$this->db->update('news', $data);

            if($result)
            {
              return 1;
            }else {
              return 0;
            }
        }
}

?>
