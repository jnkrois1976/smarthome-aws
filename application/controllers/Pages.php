<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Pages extends CI_Controller {
    
    	public function welcome(){
    	    $data = array(
                'page_class' => 'welcome',
                'seo_page' => TRUE,
    			'title_tag' => $this->lang->line('welcome_head_title_services'),
    			'description' => $this->lang->line('welcome_head_description_services'),
    			'keywords' => $this->lang->line('welcome_keywords_homepage'),
    			'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
                'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
                'main_content' => 'pages/welcome_view'
            );
    	     $this->load->view('templates/template_view', array('data' =>$data));
    	}
    	
    	public function voice(){
    	    $data = array(
                'page_class' => 'voiceAssistants',
                'seo_page' => TRUE,
    			'title_tag' => $this->lang->line('register_head_title_services'),
    			'description' => $this->lang->line('register_head_description_services'),
    			'keywords' => $this->lang->line('register_keywords_homepage'),
    			'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
                'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
                'main_content' => 'pages/voice_view'
            );
    	     $this->load->view('templates/template_view', array('data' =>$data));
    	}
    	
    	public function automation(){
    	    $data = array(
                'page_class' => 'automation',
                'seo_page' => TRUE,
    			'title_tag' => $this->lang->line('register_head_title_services'),
    			'description' => $this->lang->line('register_head_description_services'),
    			'keywords' => $this->lang->line('register_keywords_homepage'),
    			'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
                'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
                'main_content' => 'pages/automation_view'
            );
    	     $this->load->view('templates/template_view', array('data' =>$data));
    	}
    	
    	public function platforms(){
    	    $data = array(
                'page_class' => 'platforms',
                'seo_page' => TRUE,
    			'title_tag' => $this->lang->line('register_head_title_services'),
    			'description' => $this->lang->line('register_head_description_services'),
    			'keywords' => $this->lang->line('register_keywords_homepage'),
    			'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
                'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
                'main_content' => 'pages/platforms_view'
            );
    	     $this->load->view('templates/template_view', array('data' =>$data));
    	}
    	
    	public function protocols(){
    	    $data = array(
                'page_class' => 'protocols',
                'seo_page' => TRUE,
    			'title_tag' => $this->lang->line('register_head_title_services'),
    			'description' => $this->lang->line('register_head_description_services'),
    			'keywords' => $this->lang->line('register_keywords_homepage'),
    			'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
                'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
                'main_content' => 'pages/protocols_view'
            );
    	     $this->load->view('templates/template_view', array('data' =>$data));
    	}
    	
    	public function configure(){
    	    $this->load->model('pages_model');
			$hubs = $this->pages_model->get_hubs();
			$voice_assistants = $this->pages_model->get_voice_assistants();
    	    $data = array(
                'page_class' => 'configure',
                'seo_page' => TRUE,
    			'title_tag' => $this->lang->line('register_head_title_services'),
    			'description' => $this->lang->line('register_head_description_services'),
    			'keywords' => $this->lang->line('register_keywords_homepage'),
    			'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
                'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
                'main_content' => 'pages/configure_view',
                'hubs' => $hubs,
                'voice_assistants' => $voice_assistants
            );
    	     $this->load->view('templates/template_view', array('data' =>$data));
    	}
    	
    }

?>