<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super_m extends CI_Model  {

    public function fetch_data_quotes()
    {
        $this->db->select("*");
        $this->db->from("quotes");
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            $result = $query->result();
        }
        else
        {
            $result = array();
        }
        
        return $result;
    }

}