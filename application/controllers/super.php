<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super extends CI_Controller {

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('super_m');
    }

	public function index()
	{
		echo "Hello World";
	}

    public function fetch_data_quotes()
    {
        $data = $this->super_m->fetch_data_quotes();
        echo json_encode($data);
    }
}
