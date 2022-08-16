<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_m extends CI_Model  {

    public function fetch_data_user()
    {
        $this->db->select("*");
        $this->db->from("users");
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

    public function validate_user()
    {
        $arr_post = $this->input->post();
        
        $username = $arr_post['username'];
        $password = $arr_post['password'];
        $fcm_token = isset($arr_post['fcm_token']) ? $arr_post['fcm_token'] : '';
        
        $query_users = $this->db->query("SELECT * FROM `users` WHERE (`username` = ".$this->db->escape($username).") AND `password` = ".$this->db->escape(sha1($password)));
        if($query_users->num_rows() > 0)
        {
            $result = $query_users->row_array();
            $this->db->where('user_id', $result['user_id']);
            $this->db->update('users', array('fcm_token' => $fcm_token));

            $data['user'] = $result;
            $data['status'] = 'success';
        }
        else
        {
            $data['status'] = 'error';
        }

        return $data;
    }

    public function update_fcm_token()
    {
        $arr_post = $this->input->post();
        $fcm_token = $arr_post['fcm_token'];
        $user_id = $arr_post['user_id'];

        $this->db->where('user_id', $user_id);
        $this->db->update('users', array('fcm_token' => $fcm_token));
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

    public function get_user_id($user_id=null)
    {
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('users');

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