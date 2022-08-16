<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('user_m');
    }

	public function index()
	{
		echo "Hello World";
	}

    public function fetch_data_user()
    {
        $data = $this->user_m->fetch_data_user();
        echo json_encode($data);
    }

    public function validate_user()
    {
        $data = $this->user_m->validate_user();
        echo json_encode($data);
    }

    public function update_fcm_token()
    {
        $data = $this->user_m->update_fcm_token();
        echo json_encode($data);
    }
}
