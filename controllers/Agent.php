<?php

class Agent extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Agent_model');
    } 

    /*
     * Listing of agents
     */
    function index()
    {  
	if($this->session->userdata('logged_in'))
                {
                  $session_data = $this->session->userdata('logged_in');
                  $data['nom'] = $session_data['nom'];
                  $data['prenom'] = $session_data['prenom'];
                  $data['email'] = $session_data['email'];
				  $data['role'] = $session_data['role'];
				  
        $data['agents'] = $this->Agent_model->get_all_agents();

        $data['_view'] = 'agent/index';
        $this->load->view('layouts/main',$data);
		
		}
          else
                {
                  //If no session, redirect to login page
                  redirect(site_url('login'), 'refresh');
                }
    }

    /*
     * Adding a new agent
     */
    function add()
	
    {   
	
	if($this->session->userdata('logged_in'))
                {
                  $session_data = $this->session->userdata('logged_in');
                  $data['nom'] = $session_data['nom'];
                  $data['prenom'] = $session_data['prenom'];
                  $data['email'] = $session_data['email'];
				  $data['role'] = $session_data['role'];
				  
        $this->load->library('form_validation');

		$this->form_validation->set_rules('ip','Ip','valid_ip');
		$this->form_validation->set_rules('utilisateur','Utilisateur','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nom_agent' => $this->input->post('nom_agent'),
				'placement' => $this->input->post('placement'),
				'ip' => $this->input->post('ip'),
				'utilisateur' => $this->input->post('utilisateur'),
				'mdp' => $this->input->post('mdp'),
            );
            
            $agent_id = $this->Agent_model->add_agent($params);
            redirect('agent/index');
        }
        else
        {            
            $data['_view'] = 'agent/add';
            $this->load->view('layouts/main',$data);
        }
		
		}
          else
                {
                  //If no session, redirect to login page
                  redirect(site_url('login'), 'refresh');
                }
				
    }  

    /*
     * Editing a agent
     */
    function edit($id)
    {   
	if($this->session->userdata('logged_in'))
                {
                  $session_data = $this->session->userdata('logged_in');
                  $data['nom'] = $session_data['nom'];
                  $data['prenom'] = $session_data['prenom'];
                  $data['email'] = $session_data['email'];
				  $data['role'] = $session_data['role'];
				  
        // check if the agent exists before trying to edit it
        $data['agent'] = $this->Agent_model->get_agent($id);
        
        if(isset($data['agent']['id']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('ip','Ip','valid_ip');
			$this->form_validation->set_rules('utilisateur','Utilisateur','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nom_agent' => $this->input->post('nom_agent'),
					'placement' => $this->input->post('placement'),
					'ip' => $this->input->post('ip'),
					'utilisateur' => $this->input->post('utilisateur'),
					'mdp' => $this->input->post('mdp'),
                );

                $this->Agent_model->update_agent($id,$params);            
                redirect('agent/index');
            }
            else
            {
                $data['_view'] = 'agent/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The agent you are trying to edit does not exist.');
		
		}
          else
                {
                  //If no session, redirect to login page
                  redirect(site_url('login'), 'refresh');
                }
				
    } 

    /*
     * Deleting agent
     */
    function remove($id)
    {
		
		if($this->session->userdata('logged_in'))
                {
                  $session_data = $this->session->userdata('logged_in');
                  $data['nom'] = $session_data['nom'];
                  $data['prenom'] = $session_data['prenom'];
                  $data['email'] = $session_data['email'];
				  $data['role'] = $session_data['role'];
				  
        $agent = $this->Agent_model->get_agent($id);

        // check if the agent exists before trying to delete it
        if(isset($agent['id']))
        {
            $this->Agent_model->delete_agent($id);
            redirect('agent/index');
        }
        else
            show_error('The agent you are trying to delete does not exist.');
		
		}
          else
                {
                  //If no session, redirect to login page
                  redirect(site_url('login'), 'refresh');
                }
				
    }
    
	function check()
	{
	  $ip=$_POST['ip'];
      $statut = $this->Agent_model->testping($ip);	  
	  echo $statut;
		
	}
}
