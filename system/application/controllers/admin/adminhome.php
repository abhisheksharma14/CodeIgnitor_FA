<?php

class AdminHome extends Controller
{	
	/**
	 * Initialises the controller
	 *
	 * @return Admin
	 */
    
    function AdminHome()
    {
        parent::Controller();
        
        ////////////////////////////
		//CHECKING FOR PERMISSIONS
		///////////////////////////
		//-------------------------------------------------
        //only 'admin' and 'superadmin' can manage users
        
        $this->freakauth_light->check('admin');
        
        //-------------------------------------------------
        //END CHECKING FOR PERMISSION
        
        $this->_container = $this->config->item('FAL_template_dir').'template_admin/container';
        
    }
	
    	// --------------------------------------------------------------------
	
    /**
     * Displays home page of Admin Console
     *
     */
    function index()
    {	   
    	$data['heading']='Admin Console home';
    	$data['action']='<h1 style="margin-left:20px;">Welcome to the admin console</h1>';
        $data['content']="<div class='well col-md-8' style='margin-left:60px; margin-right:20px;'><p>Here You can  manage users and administrators</p>"
						."<p>Use the menu above to perform different management operations</p>"
						."<p>You can also implement this administration console and build the necessary administration stuff for you custom controllers (i.e. blog posts, news, gallery etc.)</p>"
						."</div>";

		$data['page'] = $this->config->item('FAL_template_dir').'template_admin/example/example';

		$this->load->vars($data);

	    $this->load->view($this->_container);
        
    }
    

}