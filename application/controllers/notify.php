<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notify extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        $this->load->model('notify_m');
    }

	public function index()
	{
		echo "Hello World";
	}

    public function send_notify()
    {
        $rs_data['user'] = $this->user_m->fetch_data_user();
        $this->load->view('notify_v', $rs_data);
    }

    public function send_notification()
    {
        $rs = $this->notify_m->send_notification();
        echo json_encode($rs);
    }

    public function send_notification_v2()
    {
        $rs['notification'] = $this->notify_m->send_notification_v2();
        echo json_encode($rs);
    }
}
