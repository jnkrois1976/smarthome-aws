<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	public function index(){
        $data = array(
            'page_class' => 'homepage',
            'seo_page' => TRUE,
            'title_tag' => $this->lang->line('register_head_title_services'),
    		'description' => $this->lang->line('register_head_description_services'),
    		'keywords' => $this->lang->line('register_keywords_homepage'),
            'register_profile' => ($this->session->userdata('authenticated') == NULL ? "Register / Sign in": "My Profile"),
            'register_profile_link' => ($this->session->userdata('authenticated') == NULL ? "register": "profile"),
            'main_content' => 'pages/homepage_view'
        );
        $this->load->view('templates/template_view', array('data' =>$data));
    }
}
