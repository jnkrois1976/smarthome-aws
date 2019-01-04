<?php 
    
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
	class Table extends CI_Controller {
		public function index(){
		    $this->load->model('table_model');
			$query = $this->table_model->get_users();
		    $data = array(
                'page_class' => 'table',
                'seo_page' => FALSE,
    			'title_tag' => $this->lang->line('register_head_title_services'),
    			'description' => $this->lang->line('register_head_description_services'),
    			'keywords' => $this->lang->line('register_keywords_homepage'),
    			'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
                'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
                'results' => $query,
                'main_content' => 'pages/table_view'
            );
    	     $this->load->view('templates/template_view', array('data' =>$data));
	    }
	}
?>
