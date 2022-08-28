<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notify_m extends CI_Model  {

    public function send_notification()
    {
        
        $arr_get = $this->input->get();

        $data = array(
            'title' => $arr_get['title'],
            'body' => $arr_get['body'],
          );

        $apiKey = 'AAAAMKZZnhI:APA91bGcrDBfsEICpwhrX-91Kwh6uiYdb7-Zsol5Um7KhxIFEFVOFz293t_rAbvzlMxlFtsbydFviUckBOvNh43qtlLEJG58VnlGhPhVP9-pg2C7yPxU6sCE6maYlroV9arIjIb8NVvM';
        
        $url = 'https://fcm.googleapis.com/fcm/send';
    
        $headers = array('Authorization: key=' .$apiKey, 'Content-Type: application/json', 'priority' => 10);

        if(isset($arr_get['to']) && $arr_get['to'] == 1)
        {
            
            $fields = array('to' => '/topics/all' , 'notification' => $data);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            curl_close($ch);
          
            echo $result;
            die;
        }
        else
        {
            $user_info = $this->user_m->get_user_id($arr_get['user_id']);

            $fields = array('to' => $user_info['fcm_token'] , 'notification' => $data);
            
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
            $result = curl_exec($ch);
            curl_close($ch);

            echo $result;
            die;
        }
    }

    public function send_notification_v2()
    {
        $arr_post = $this->input->post();

        if(isset($arr_post))
        {
            $data['title'] = $arr_post['title'];
            $data['body'] = $arr_post['body'];
        }

        return $data;
    }

}