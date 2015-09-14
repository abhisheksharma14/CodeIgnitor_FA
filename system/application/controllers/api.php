<?php

require APPPATH.'/libraries/REST_Controller.php';
error_reporting(E_ERROR | E_PARSE);

class Api extends REST_Controller {
  	
  	function user_get() 
  	{
       	$data = new stdClass;
    
    	$data->name = "Example";
    
    	$this->response($data); 
  	}

	function users_get($fields=null, $limit=null, $where=null)  	
	{	
		$id = $this->uri->segment(3);

		$where = array('id' => $id);

		$this->load->model('get_data');
		
		$fields = 'id, user_name, email';
		
		//$fields = null;

		if ($where['id']) {
			
			$data = $this->get_data->getUsers($fields,null,$where);			
		}
		else{
			
			$data = $this->get_data->getUsers($fields);	
		}

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
		$id = $this->uri->segment(3);
		
		$where = array('id' => $id);
		
		$this->load->model('get_data');
		
		$fields = 'id, name, image, price, quantity';
		
		if ($where['id']) {
			
			$data = $this->get_data->geProducts($fields,null,$where);			
		}
		else{
			
			$data = $this->get_data->getProducts($fields);	
		}

		//$this->response($data->result());
		
		 if($data->result()){
		 	
		 	$this->response($data->result());
		 }
		 else {
		 	$response = new stdClass;

		 	$response->error = "Requested Data not Found";
		 	
		 	$this->response($response);
		 }
	}

	function shops_get($fields=null, $limit=null, $where=null)  	
	{	
		$id = $this->uri->segment(3);
		
		$where = array('id' => $id);
		
		$this->load->model('get_data');
		
		$fields = 'id, name, owner, address, mobile, image';
		
		if ($where['id']) {
			
			$data = $this->get_data->getShops($fields,null,$where);			
		}
		else{
			
			$data = $this->get_data->getShops($fields);	
		}

		//$this->response($data->result());
	
		if($data->result()){
		 	
		 	$this->response($data->result());
		 }
		 else {
			$response = new stdClass;
		 	
		 	$response->error = "Requested Data not Found";
		 	
		 	$this->response($response);
		 }
	}

	function malls_get($fields=null, $limit=null, $where=null)  	
	{	
		$id = $this->uri->segment(3);
		
		$where = array('id' => $id);
		
		$this->load->model('get_data');
		
		$fields = 'id, name, address, latitude, longitude, rating, image';
		
		if ($where['id']) {
			
			$data = $this->get_data->getMalls($fields,null,$where);			
		}
		else{
			
			$data = $this->get_data->getMalls($fields);	
		}

		//$this->response($data->result());
		
		if($data->result()){
		 	
		 	$this->response($data->result());
		 }
		 else {
		 	$response = new stdClass;

		 	$response->error = "Requested Data not Found";
		 	
		 	$this->response($response);
		 }
	}
}

?>