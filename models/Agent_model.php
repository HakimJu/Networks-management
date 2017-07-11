<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Agent_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get agent by id
     */
    function get_agent($id)
    {
        return $this->db->get_where('agents',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all agents
     */
    function get_all_agents()
    {
        return $this->db->get('agents')->result_array();
    }
    
    /*
     * function to add new agent
     */
    function add_agent($params)
    {
        $this->db->insert('agents',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update agent
     */
    function update_agent($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('agents',$params);
        if($response)
        {
            return "agent updated successfully";
        }
        else
        {
            return "Error occuring while updating agent";
        }
    }
    
    /*
     * function to delete agent
     */
    function delete_agent($id)
    {
        $response = $this->db->delete('agents',array('id'=>$id));
        if($response)
        {
            return "agent deleted successfully";
        }
        else
        {
            return "Error occuring while deleting agent";
        }
    }
	
	function testping($ip)
 {
     $ping= utf8_decode(shell_exec('ping -n 1 '.$ip));
     
     $ping = str_replace('requ?te', 'requête', $ping);
     $ping = str_replace('donn?es?', 'données', $ping);
     $ping = str_replace('R?ponse', 'Réponse', $ping);
     $ping = str_replace('?: octets', ' : octets', $ping);
     $ping = str_replace('Paquets?', 'Paquets', $ping);
     $ping = str_replace('envoy?s', 'envoyés', $ping);
     $ping = str_replace('re?us', 'reçus', $ping);
     $ping = str_replace('Dur?e', 'Durée', $ping);
     $ping = str_replace('D?lai d\'attente de la demande d?pass?.', 'Délai d\'attente de la demande dépassé.', $ping);
     $ping = str_replace('?: Impossible de joindre l\'h?te de destination.', ' : Impossible de joindre l\'hôte de destination.', $ping);
						  
      if (strpos($ping, 'Impossible') !== false) {
	 $reponse='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-danger btn-xs"><span class="fa fa-thumbs-down"></span> INACTIF </a>';
	 
	 
	 
      }
       elseif (strpos($ping, 'attente de la demande') !== false) {
	  $reponse='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-warning btn-xs"><span class="fa fa-exclamation-triangle"></span> INACCESSIBLE </a>';
	}
          else
        {
         $reponse='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-success btn-xs"><span class="fa fa-thumbs-o-up"></span> ACTIF </a>';
        }
     return $reponse ;
 }
}
