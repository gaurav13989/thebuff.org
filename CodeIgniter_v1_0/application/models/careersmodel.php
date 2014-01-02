<?php
  
  class Careersmodel extends CI_Model
    {
       function getCareers($id)
        
        {
           $this->db->where('id',$id);
           $q=$this->db->get('careers');

           if($q->num_rows()>0)
           {
           	foreach($q->result() as $row)
           	{
           		$data[]=$row;
           	}
           	return $data;
           }
        }

      public function insertCareers($insertvalues)
      {
        
        $this->db->insert('careers',$insertvalues);
        echo "INSERTED";
      }
      
      public function updateCareers($id,$updatevalues)
      {
      
        $this->db->where('id',$id);
        //$this->db->where('$userId',$userId);
        $this->db->update('careers',$updatevalues);
        echo "UPDATED";
      }

      public function deleteCareers($id)
      {
        $this->db->where('id',$id);
       // $this->db->where('$userId',$userId);
        $this->db->delete('careers');
        echo "DELETED";
      }

    } 