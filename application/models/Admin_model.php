<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    //insert into user table
    function loadRegisters ()
    {
      $this->db->select ('ID, Approach, Title, Year, NeedApproval');
      $this->db->from('caracterization');

      $query = $this->db->get();
      $count = 0;

      foreach ($query->result() as $row) {
        $data['info'][$count++] = array ( 'id'        => $row->ID, 
                                          'name'      => $row->Approach,
                                          'title'     => $row->Title, 
                                          'year'      => $row->Year,
                                          'approval'  => $row->NeedApproval
                                          );
      }
      
      $data['count'] = $query->num_rows();
      return $data;  
    }

    function deleteRegister ($id) 
    {
      $this->db->delete ('caracterization', array('ID' =>  $id));
    }

    function approveRegister ($id) 
    {
      $data = array( 'NeedApproval' => 0 );
      $this->db->where('ID', $id);
      $this->db->update('caracterization', $data); 
    }

    function updateRegister ($id, $data) 
    {
      $this->db->where('ID', $id);
      $this->db->update('caracterization', $data); 
    }

    function checkIfFileExists ($id) 
    {
      $this->db->select('PDF_File');
      $this->db->from('caracterization');
      $this->db->where('ID', $id);
      $this->db->limit(1);

      $query = $this->db->get();

      if($query->num_rows() == 1)
      {
        $row = $query->row_array();
        return $row['PDF_File'];
      }
      else
      {
       return null;
      }  

    }
}
?>