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
        $os = isset($arr_post['os']) ? $arr_post['os'] : '';
        $device_info = isset($arr_post['device_info']) ? $arr_post['device_info'] : '';
        
        $query_users = $this->db->query("SELECT * FROM `users` WHERE (`username` = ".$this->db->escape($username).") AND `password` = ".$this->db->escape(sha1($password)));
        if($query_users->num_rows() > 0)
        {
            $result = $query_users->row_array();
            $this->db->set('fcm_token', $fcm_token);
            $this->db->set('os', $os);
            $this->db->set('device_info', $device_info);
            $this->db->where('user_id', $result['user_id']);
            $this->db->update('users');
            $this->insert_device_info($arr_post,$result['user_id']);
            // $is_device_active = $this->validate_user_device_id($arr_post,$result['user_id']);

            $data['user'] = $result;
            // $data['is_device_active'] = $is_device_active;
            $data['status'] = 'success';
        }
        else
        {
            $data['status'] = 'error';
        }

        return $data;
    }

    public function insert_device_info($arr_post=null,$user_id=null)
    {
        $arr = json_decode($arr_post['device_info'], true);
        
        $this->db->select('*');
        $this->db->from('users_device');
        $this->db->where('users_id', $user_id);
        $this->db->where('device_unique_id', $arr['id']);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            // inactive all other device
            $this->db->set('status', 0);
            $this->db->where('users_id', $user_id);
            $this->db->update('users_device');

            // active current device
            $this->db->set('status', 1);
            $this->db->where('users_id', $user_id);
            $this->db->where('device_unique_id', $arr['id']);
            $this->db->update('users_device');
        }
        else
        {
 
            // inactive all other device
            $this->db->set('status', 0);
            $this->db->where('users_id', $user_id);
            $this->db->update('users_device');

            // insert new device
            $this->db->set('users_id', $user_id);
            $this->db->set('device_unique_id', $arr['id']);
            $this->db->set('device_brand', $arr['brand']);
            $this->db->set('device_model', $arr['model']);
            $this->db->set('status', 1);
            $this->db->insert('users_device');
        }


    }

    public function validate_user_device_id($arr_post=null,$user_id)
    {
        $arr = json_decode($arr_post['device_info'], true);

        $this->db->select('b.*');
        $this->db->from('users a');
        $this->db->join('users_device b', 'a.user_id = b.users_id');
        $this->db->where('a.user_id', $user_id);
        $this->db->where('b.status', 1);
        $query = $this->db->get();
        $last_query = $this->db->last_query();
        if($query->num_rows() > 0)
        {
            $result = $query->row_array();
            if($result['device_unique_id'] == $arr['id'] && $result['device_brand'] == $arr['brand'] && $result['device_model'] == $arr['model'])
            {
                $data['user'] = $result;
                $data['is_device_active'] = 'success';
            }
            else
            {
                $data['user'] = $result;
                $data['is_device_active'] = 'error';
            }
        }
        else
        {
            $data['is_device_active'] = 'success';
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

    public function get_user_device_active()
    {
        $arr_post = $this->input->post();
        ad($arr_post);die;
        $arr = json_decode($arr_post['device_info'], true);

        $this->db->select('b.*');
        $this->db->from('users a');
        $this->db->join('users_device b', 'a.user_id = b.users_id');
        $this->db->where('a.user_id', $arr_post['user_id']);
        $this->db->where('b.status', 1);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $result = $query->row_array();
            if($result['device_unique_id'] == $arr['id'] && $result['device_brand'] == $arr['brand'] && $result['device_model'] == $arr['model'])
            {
                $data['user'] = $result;
                $data['is_device_active'] = 'success';
            }
            else
            {
                $data['user'] = $result;
                $data['is_device_active'] = 'error';
            }
        }
        else
        {
            $data['is_device_active'] = 'success';
        }

        return $data;
    }

    public function checking_main_device_info()
    {
        $arr_post = $this->input->post();
        $this->db->select('*');
        $this->db->from('users_device');
        $this->db->where('device_unique_id', $arr_post['device_unique_id']);
        $query = $this->db->get();
        if($query->num_rows() > 0)
        {
            $result = $query->row_array();
            $data['status'] = 'success';
            $data['user'] = $result;
        }
        else
        {
            $data['status'] = 'error';
        }

        return $data;
    }

    public function user_logout()
    {
        $arr_post = $this->input->post();
        $this->db->set('status', 0);
        $this->db->where('device_unique_id', $arr_post['device_unique_id']);
        $this->db->update('users_device');
        if($this->db->affected_rows() > 0)
        $data['status'] = 'success';
        return $data;
    }

}