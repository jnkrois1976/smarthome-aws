<?php 
    
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
	class Login extends CI_Controller {
		public function validate(){
		    try{
		        $this->load->model('login_model');
    			$query = $this->login_model->validate();
    			if($query){
    				$user = $query['username'].$query['pwd'];
    				$data = array(
    					'user_name' => $query['display_name'],
    					'user_id' => $query['id'],
    					'authenticated' => true
    				);
    				$this->session->set_userdata($data);
    			}else{
    				throw new Exception('message for user');
    			}
		    }catch (Exception $e){
		        echo $e->getMessage();
		    }
		}
	}
?>
