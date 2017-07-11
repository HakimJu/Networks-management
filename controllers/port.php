<?php

 
class Port extends CI_Controller{
    function __construct()
    {
        parent::__construct();
      
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
            
            $data['q']=$this->db->get('agents')->result_array();

            $data['_view'] = 'ports/index';
        $this->load->view('layouts/main',$data);
    }
    
     else
                {
                  //If no session, redirect to login page
                  redirect(site_url('login'), 'refresh');
                }

 
  }
  
  function checkports()
  
  {
      	
	$port_init= $_POST['port_init'];
        $port_end= $_POST['port_end'];
        $domaine=$_POST['domaine'];
                
        $ports = array();
       
       for ($x = $port_init; $x <=$port_end; $x++)
            {
                $ports[] = $x;
            }
        
        
     
         
	
	$results = array();
	foreach($ports as $port) {
		if($pf = @fsockopen($domaine, $port, $err, $err_string, 1)) {
			$results[$port] = true;
			fclose($pf);
		} else {
			$results[$port] = false;
		}
	}
 
	foreach($results as $port=>$val)	{
		$prot = getservbyport($port,"tcp");
                echo "Port $port ($port): ";
		if($val) {
			echo "<span style=\"color:green\">Ouvert</span><br/>";
		}
		else {
			echo "<span style=\"color:red\">Fermé</span><br/>";
		}
	}

           
         }
      
      
      
  
  
  
  
  
  
  
}
