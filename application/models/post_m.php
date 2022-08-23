<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_m extends CI_Model  {

    public function fetch_data_posts()
    {
        $this->db->select("*");
        $this->db->select('CONCAT(DATE_FORMAT(dt_added, "%b %d ,%Y • "),author) AS author_with_date', FALSE);
        $this->db->from("posts");
        $this->db->where("status", "1");
        $this->db->order_by("post_id", "desc");
        $this->db->limit(50);
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

    public function add_post()
    {
        $arr_post = $this->input->post();
        $data['post'] = $arr_post['post'];
        $data['author'] = $arr_post['author'];
        
        $this->db->set('post', $data['post']);
        $this->db->set('author', $data['author']);
        $this->db->insert('posts');
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

    public function edit_post()
    {
        $arr_post = $this->input->post();
        $data['post'] = $arr_post['post'];
        $data['author'] = $arr_post['author'];
        $post_id = $arr_post['post_id'];
        
        $this->db->where('post_id', $post_id);
        $this->db->update('posts', $data);
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

    public function delete_post()
    {
        $arr_post = $this->input->post();
        $post_id = $arr_post['post_id'];
        $this->db->where('post_id', $post_id);
        $this->db->update('posts', array('status' => '0'));
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

    public function get_post_by_id()
    {
        $arr_post = $this->input->post();
        $post_id = $arr_post['post_id'];
        $this->db->select("*");
        $this->db->from("posts");
        $this->db->where("post_id", $post_id);
        $this->db->where("status", "1");
        $query = $this->db->get();
        
        if($query->num_rows() > 0)
        {
            $result = $query->row_array();
        }
        else
        {
            $result = array();
        }
        
        return $result;
    }

}