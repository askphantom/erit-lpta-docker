<?php

class Global_model extends CI_Model {
	
	
	public function __construct(){
		parent::__construct();
	}// End Function
	

	public function dbSingleColQuery($col, $table, $clause){	
				
		$this->db->select($col);
		$this->db->from($table);
		$this->db->where($clause);
				
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){
			$qry_row = $query->row_array();
			return $qry_row[$col];		
		}
		else{
			return false;	
		}
		
	}// End Function


	public function dbSingleRowQuery($cols, $table, $clause){	
				
		$this->db->select($cols);
		$this->db->from($table);
		$this->db->where($clause);
				
		$query = $this->db->get();
		
		if ($query){
			$qry_row = $query->row_array();
			return $qry_row;		
		}
		else{
			return false;	
		}
		
	}// End Function


	public function dbMultiRowQuery($cols = false, $table, $clause = false, $order_by_col = false, $order_by_value = false, $limit = false, $per_page = false, $group_by_col = false){	
			
		if($cols){
			$this->db->select($cols);
		}
		
		$this->db->from($table);
		
		if($clause){
			$this->db->where($clause);
		}
		
		if($group_by_col){
			$this->db->group_by($group_by_col);
		}
		
		if($order_by_col && $order_by_value){
			$this->db->order_by($order_by_col, $order_by_value);
		}	

		if($per_page && $limit == 0){
			$this->db->limit($per_page);
		}		
		elseif($per_page && $limit){
			$this->db->limit($per_page, $limit);
		}
				
		$query = $this->db->get();
		
		if ($query->num_rows() > 0){
			return $query->result_array();	
		}
		else{
			return false;	
		}
		
	}// End Function


	public function dbRowCountQuery($table, $clause = false){	
				
		$this->db->from($table);
		
		if($clause){
			$this->db->where($clause);
		}
				
		$query_count = $this->db->count_all_results();
		
		if ($query_count > 0){
			return $query_count;		
		}
		else{
			return 0;	
		}
		
	}// End Function
			
	
	public function dbInsertQuery($data_array, $table){
		
		$query_result = $this->db->insert($table, $data_array);
		
		return $query_result;
		
	}// End function
		
		
	public function dbUpdateQuery($data_array, $table, $clause){
		
		$this->db->where($clause);
		$query_result = $this->db->update($table, $data_array);
		
		return $query_result;
		
	}// End function


	public function dbUpdateMultiCondQuery($data_array, $table, $cond_array){	
				
		$this->db->where($cond_array);
		$query_result = $this->db->update($table, $data_array);
		
		return $query_result;
		
	}// End function


	public function dbDeleteQuery($data, $col, $table){	
		
		$this->db->delete($table, array($col => $data)); 
				
		$query_resp = $this->db->affected_rows();
		
		if ($query_resp > 0){
			return true;		
		}
		else{
			return false;	
		}
		
	}// End Function


	public function dbDeleteMultiCondQuery($data_array,  $table){	
	
		$this->db->delete($table, $data_array); 
				
		$query_resp = $this->db->affected_rows();
		
		if ($query_resp > 0){
			return true;		
		}
		else{
			return false;	
		}
		
	}// End Function
	
			
	public function dbCustomSingleRowQuery($query){
		
		$qry_result = $this->db->query($query);
		return $qry_result->row_array();
		
	}// End function
			
	
	public function dbCustomMultiRowQuery($query){
		
		$qry_result = $this->db->query($query);
		return $qry_result->result_array();
		
	}// End function
	

	public function insertBulkData($table, $data){
		$query_result = $this->db->insert_batch($table, $data);
		return $query_result;
	}


	public function dbMultiRowQueryLike($class_id = false, $subject_id, $keywords){	
			

		$this->db->select('*');
		$this->db->from('lesson');

		if($class_id){
			$this->db->where('class_id', $class_id);
		}

		if($subject_id){
			$this->db->where('subject_id', $subject_id);
		}
		
		$this->db->like('keywords', $keywords);
		// $this->db->order_by('id');
		
		
		// if($group_by_col){
		// 	$this->db->group_by($group_by_col);
		// }
		
		// if($order_by_col && $order_by_value){
		// 	$this->db->order_by($order_by_col, $order_by_value);
		// }	

		// if($per_page && $limit == 0){
		// 	$this->db->limit($per_page);
		// }		
		// elseif($per_page && $limit){
		// 	$this->db->limit($per_page, $limit);
		// }
		$query = $this->db->get();
		// return $this->db->last_query();
		
		if ($query->num_rows() > 0){
			return $query->result_array();	
		}
		else{
			return false;	
		}
		
	}// End Function
	
}//End class

?>