<?php

	class Account_model extends CI_Model {
			
		function create_account(){
		    try{
		        if(!empty($_POST)){
		            $create_account = array(
		                'fname' => $this->input->post('fname'),
		                'lname' => $this->input->post('lname'),
		                'display_name' => $this->input->post('fname')." ".$this->input->post('lname'),
		                'username' => $this->input->post('username'),
		                'pwd' => $this->input->post('pwd')
	                );
	                $match_values = array(
	                	'confirmUsername' => $this->input->post('confirmUsername'),
	                	'confirmPwd' => $this->input->post('confirmPwd')
                	);
                	$this->session->set_userdata(array_merge($create_account, $match_values));
	                $username = $create_account['username'];
	                $query = $this->db->query("SELECT username FROM users WHERE username='$username' LIMIT 1");
		            if($create_account['username'] != $match_values['confirmUsername']){
		                throw new Exception("Please make sure that the email address fields match.");
		            }elseif($query->num_rows() > 0){
		                throw new Exception("The email you provided is already associated with an existing account.");
		            }elseif($create_account['pwd'] != $match_values['confirmPwd']){
		                throw new Exception("Please make sure that the password fields match.");
		            }else{
		            	$create_account['pwd'] = password_hash($this->input->post('pwd'), PASSWORD_DEFAULT);
			            $insert = $this->db->insert('users', $create_account);
			            $this->session->set_userdata('authenticated', 'true');
			            return $insert;
		            }
		        }else{
		        	throw new Exception("form not submitted");
		        }
		    }catch (Exception $e){
		        return $e->getMessage();
		    }
		}
		
		function verify_user(){
			try{
				if(!empty($_POST)){
					$username = $this->input->post('username');
					$user_pwd = $this->input->post('pwd');
					$pwd_query = "SELECT display_name, pwd FROM users WHERE username='$username' LIMIT 1";
					$query = $this->db->query($pwd_query);
					$row = $query->row();
					if($row){
						$display_name = $row->display_name;
						$pwd = $row->pwd;
					}
					$verify_pwd = password_verify($user_pwd, $pwd);
					if($verify_pwd){
						$this->session->set_userdata('authenticated', 'true');
						$this->session->set_userdata('display_name', $display_name);
						return $verify_pwd;
					}else{
						throw new Exception("Please verify your username and password and try again");
					}
				}else{
					throw new Exception("form is empty");
				}
			}catch(Exception $e){
				return $e->getMessage();
			}
		}
	
	}

?>