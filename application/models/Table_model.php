<?php

	class Table_model extends CI_Model {

        function get_users(){
    		$sql = "SELECT * FROM users";
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