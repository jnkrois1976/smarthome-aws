<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Register extends CI_Controller {
    
    	public function index(){
    	    if($this->session->userdata('authenticated') == 'true'){
    	        redirect('profile/index');
    	    }else{
        	    $data = array(
                    'page_class' => 'register',
                    'seo_page' => TRUE,
        			'title_tag' => $this->lang->line('register_head_title_services'),
        			'description' => $this->lang->line('register_head_description_services'),
        			'keywords' => $this->lang->line('register_keywords_homepage'),
        			'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
                    'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
                    'error' => $this->session->flashdata('error'),
                    'main_content' => 'pages/register_view'
                );
        	     $this->load->view('templates/template_view', array('data' =>$data));
    	    }
    	    
    	}
    }

?>