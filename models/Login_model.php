<?php

 
class Login_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
  
    
    /*
     * Get all users
     */
    function get_users($email,$mdp)
    {      
		   $this -> db -> select('id, nom, prenom, email, mdp, role');
		   $this -> db -> from('users');
		   $this -> db -> where('email', $email);
		   $this -> db -> where('mdp', sha1($mdp));
		   $this -> db -> limit(1);
		 
		   $query = $this -> db -> get();
		 
		   if($query -> num_rows() == 1)
		   {
			 return $query->result();
		   }
		   else
		   {
			 return false;
		   }
    }
   
}
