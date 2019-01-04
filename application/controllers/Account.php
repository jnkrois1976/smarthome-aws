<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Account extends CI_Controller {
        
        public function create(){
            $this->load->model('account_model');
    		$query = $this->account_model->create_account();
    		if(is_bool($query) && $query == TRUE){
    		    $register_data = array('fname', 'lname', 'display_name', 'username', 'confirmUsername', 'pwd', 'confirmPwd');
    		    $this->session->unset_userdata($register_data);
    		    redirect('/profile/index');
    		}else{
    		    $this->session->set_flashdata('error', $query);
    		    redirect('/register/index');
    		}
        }
        
        public function login(){
            $this->load->model('account_model');
            $verify = $this->account_model->verify_user();
            if(is_bool($verify)){
                $this->session->set_userdata('authenticated', 'true');
    		    redirect('/pages/welcome');
            }else{
                $this->session->set_flashdata('error', $verify);
    		    redirect('/register/index');
            }
        }
        
        public function logout(){
            $this->session->sess_destroy();
            redirect('/');
        }
    }
?>