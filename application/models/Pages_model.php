<?php

	class Pages_model extends CI_Model {

        function get_hubs(){
    		$sql = "SELECT * FROM products WHERE category='hub'";
    		$query = $this->db->query($sql);
			if ($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[] = $row;
				}
				return $data;
    		}else{
    			return FALSE;
    		}
	    }
	    
	    function get_voice_assistants(){
    		$sql = "SELECT * FROM products WHERE category='voice'";
    		$query = $this->db->query($sql);
			if ($query->num_rows() > 0){
				foreach($query->result() as $row){
					$data[] = $row;
				}
				return $data;
    		}else{
    			return FALSE;
    		}
	    }
	}
?>