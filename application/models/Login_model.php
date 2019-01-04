<?php

	class Login_model extends CI_Model {
			
		function validate(){
		    try{
		        $username = $this->input->post('username');
    		    $user_pwd = "SELECT * FROM users WHERE username = '$username' LIMIT 1";
    		    $query = $this->db->query($user_pwd);
    		    $row = $query->$row;
    			$verify = password_verify($this->input->post('pwd'), $row->pwd);
    			if($password){
    			    return $row->display_name;
    			}else{
    			    throw new Exception('Your username or password is incorrect. Please try again.');
    			}
		    }catch (Exception $e){
		        return $e->getMessage();
		    }
		}
	}

?>