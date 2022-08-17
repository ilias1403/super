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

    public function add_quote()
    {
        $data = $this->super_m->add_quote();
        echo json_encode($data);
    }

    public function edit_quote()
    {
        $data = $this->super_m->edit_quote();
        echo json_encode($data);
    }

    public function get_quote_by_id()
    {
        $data = $this->super_m->get_quote_by_id();
        echo json_encode($data);
    }

    public function delete_quote()
    {
        $data = $this->super_m->delete_quote();
        echo json_encode($data);
    }
}
