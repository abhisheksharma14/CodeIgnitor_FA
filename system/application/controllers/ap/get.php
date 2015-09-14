<?php 

require APPPATH.'/libraries/REST_Controller.php';
error_reporting(E_ERROR | E_PARSE);

class Get extends REST_Controller {
  	
  	function user_get() 
  	{
       	$data = new stdClass;
    
    	$data->name = "Example";
    
    	$this->response($data); 
  	}

  	function users_get($fields=null, $limit=null, $where=null)  	
	{	

		($fields != null) ? $this->db->select($fields) :'';
		
		($where != null) ? $this->db->where($where) :'';
		
		($limit != null ? $this->db->limit($limit['start'], $limit['end']) : '');
        
		//returns the query string

		$data = $this->db->get('fa_user');
		
		//$this->response($data->result());
		
		if($data->result()){
		 	
		 	$this->response($data->result());
		 }
		 else {

		 	$response->error = "Requested Data not Found";
		 	
		 	$this->response($response);
		 }
	}

	function products_get($fields=null, $limit=null, $where=null)  	
	{	
		$this->_prefix = $this->config->item('FAL_table_prefix');
        
        $this->_table = $this->_prefix.'user';

		($fields != null) ? $this->db->select($fields) :'';
		
		($where != null) ? $this->db->where($where) :'';
		
		($limit != null ? $this->db->limit($limit['start'], $limit['end']) : '');
        
		//returns the query string
		
		$data = $this->db->get('products');

		//$this->response($data->result());
		
		 if($data->result()){
		 	
		 	$this->response($data->result());
		 }
		 else {

		 	$response->error = "Requested Data not Found";
		 	
		 	$this->response($response);
		 }
	}

	function shops_get($fields=null, $limit=null, $where=null)  	
	{	
		

		($fields != null) ? $this->db->select($fields) :'';
		
		($where != null) ? $this->db->where($where) :'';
		
		($limit != null ? $this->db->limit($limit['start'], $limit['end']) : '');
        
		//returns the query string
		
		$data = $this->db->get('shops');
		
		//$this->response($data->result());
	
		if($data->result()){
		 	
		 	$this->response($data->result());
		 }
		 else {

		 	$response->error = "Requested Data not Found";
		 	
		 	$this->response($response);
		 }
	}

	function malls_get($fields=null, $limit=null, $where=null)  	
	{	

		($fields != null) ? $this->db->select($fields) :'';
		
		($where != null) ? $this->db->where($where) :'';
		
		($limit != null ? $this->db->limit($limit['start'], $limit['end']) : '');
        
		//returns the query string

		$data = $this->db->get('malls');

		//$this->response($data->result());
		
		if($data->result()){
		 	
		 	$this->response($data->result());
		 }
		 else {

		 	$response->error = "Requested Data not Found";
		 	
		 	$this->response($response);
		 }
	}
}


?>