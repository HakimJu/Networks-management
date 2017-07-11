<?php

 
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
    } 

    /*
     * Listing of agents
     */
    function index()
    {
        $this->load->view('login/index');
    }
	
	function cnx()
    {
		
		 if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				
				'email' => $this->input->post('email'),
				'mdp' => $this->input->post('mdp')
				
            );
            
		  $user_id = $this->Login_model->get_users($params['email'],$params['mdp']);
		           
				  if($user_id)
            {
              $sess_array = array();
              foreach($user_id as $row)
              {
                $sess_array = array(
                  'id' => $row->id,
                  'nom' => $row->nom,
                  'prenom' => $row->prenom,
                  'email' => $row->email,
				  'role' => $row->role,
                  
                );
                $this->session->set_userdata('logged_in', $sess_array);
                redirect(site_url('moniteur'), 'refresh');
              }
              return TRUE;
			  $this->load->view('moniteur/index');

            }
        }
        else
        {            
            $this->load->view('login/index');
        }
		
		
        
		
		
        
    }
	

 
}
