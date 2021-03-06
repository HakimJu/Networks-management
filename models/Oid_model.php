<?php
/* 
 * Generated by CRUDigniter v3.0 Beta 
 * www.crudigniter.com
 */
 
class Oid_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get oid by id
     */
    function get_oid($id)
    {
        return $this->db->get_where('oid',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all oid
     */
    function get_all_oid()
    {
        return $this->db->get('oid')->result_array();
    }
    
    /*
     * function to add new oid
     */
    function add_oid($params)
    {
        $this->db->insert('oid',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update oid
     */
    function update_oid($id,$params)
    {
        $this->db->where('id',$id);
        $response = $this->db->update('oid',$params);
        if($response)
        {
            return "oid updated successfully";
        }
        else
        {
            return "Error occuring while updating oid";
        }
    }
    
    /*
     * function to delete oid
     */
    function delete_oid($id)
    {
        $response = $this->db->delete('oid',array('id'=>$id));
        if($response)
        {
            return "oid deleted successfully";
        }
        else
        {
            return "Error occuring while deleting oid";
        }
    }
}
