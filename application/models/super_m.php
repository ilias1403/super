<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super_m extends CI_Model  {

    public function fetch_data_quotes()
    {
        $this->db->select("*");
        $this->db->from("quotes");
        $this->db->where("status", "1");
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            $result = $query->result_array();
        }
        else
        {
            $result = array();
        }
        
        return $result;
    }

    public function add_quote()
    {
        $arr_post = $this->input->post();
        $data['quote'] = $arr_post['quote'];
        $data['author'] = $arr_post['author'];
        
        $this->db->set('quote', $data['quote']);
        $this->db->set('author', $data['author']);
        $this->db->insert('quotes');
        if($this->db->affected_rows() > 0)
        {
            $result['status'] = 'success';
        }
        else
        {
            $result['status'] = 'error';
        }
        
        return $result;
    }

    public function edit_quote()
    {
        $arr_post = $this->input->post();
        $data['quote'] = $arr_post['quote'];
        $data['author'] = $arr_post['author'];
        $quote_id = $arr_post['quote_id'];
        
        $this->db->where('quote_id', $quote_id);
        $this->db->update('quotes', $data);
        if($this->db->affected_rows() > 0)
        {
            $result['status'] = 'success';
        }
        else
        {
            $result['status'] = 'error';
        }
        
        return $result;
    }

    public function delete_quote()
    {
        $arr_post = $this->input->post();
        $quote_id = $arr_post['quote_id'];
        $this->db->where('quote_id', $quote_id);
        $this->db->update('quotes', array('status' => '0'));
        if($this->db->affected_rows() > 0)
        {
            $data['status'] = 'success';
        }
        else
        {
            $data['status'] = 'error';
        }
        return $data;
    }

}