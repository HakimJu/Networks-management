<?php

 
class Logs extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Logs_model');
    } 

    function index()
    {
		 if($this->session->userdata('logged_in'))
                {
            $session_data = $this->session->userdata('logged_in');
            $data['nom'] = $session_data['nom'];
            $data['prenom'] = $session_data['prenom'];
            $data['email'] = $session_data['email'];
            $data['role'] = $session_data['role'];
            
            $data['logs'] = $this->Logs_model->get_all_logs();

        $data['_view'] = 'logs/index';
        $this->load->view('layouts/main',$data);
    } else
         {
             //If no session, redirect to login page
             redirect(site_url('login'), 'refresh');
         }
  }
}
