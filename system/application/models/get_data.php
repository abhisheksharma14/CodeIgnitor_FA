<?php

class Get_data extends Model 
{
	
	// ------------------------------------------------------------------------
	/**
	 * initialises the class inheriting the methods of the class Model 
	 *
	 * @return Usermodel
	 */
    function Get_data()
    {     
        parent::Model();
        //FreakAuth_light table prefix

    }

    function getUsers($fields=null, $limit=null, $where=null)
	{	

		$this->db->select($fields);
		
		($where != null) ? $this->db->where($where) :'';
		
		($limit != null ? $this->db->limit($limit['start'], $limit['end']) : '');
	
		//returns the query string
		return $this->db->get('fa_user');
	}

	function getProducts($fields=null, $limit=null, $where=null)
	{	

		$this->db->select($fields);
		
		($where != null) ? $this->db->where($where) :'';
		
		($limit != null ? $this->db->limit($limit['start'], $limit['end']) : '');
	
		//returns the query string
		return $this->db->get('products');
	}

	function getShops($fields=null, $limit=null, $where=null)
	{	

		$this->db->select($fields);
		
		($where != null) ? $this->db->where($where) :'';
		
		($limit != null ? $this->db->limit($limit['start'], $limit['end']) : '');
	
		//returns the query string
		return $this->db->get('shops');
	}

	function getMalls($fields=null, $limit=null, $where=null)
	{	

		$this->db->select($fields);
		
		($where != null) ? $this->db->where($where) :'';
		
		($limit != null ? $this->db->limit($limit['start'], $limit['end']) : '');
	
		//returns the query string
		return $this->db->get('malls');
	}

}


?>	