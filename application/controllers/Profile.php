<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Profile extends CI_Controller {
    
    	public function index(){
    	    $data = array(
                'page_class' => 'profile',
                'seo_page' => FALSE,
    			'title_tag' => $this->lang->line('register_head_title_services'),
    			'description' => $this->lang->line('register_head_description_services'),
    			'keywords' => $this->lang->line('register_keywords_homepage'),
    			'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
                'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
                'main_content' => 'pages/profile_view'
            );
    	     $this->load->view('templates/template_view', array('data' =>$data));
    	}
    }

?>