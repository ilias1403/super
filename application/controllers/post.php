<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends CI_Controller {

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->load->model('post_m');
    }

	public function index()
	{
		echo "~singgah~";
	}

    public function fetch_data_posts()
    {
        $data = $this->post_m->fetch_data_posts();
        echo json_encode($data);
    }

    public function add_post()
    {
        $data = $this->post_m->add_post();
        echo json_encode($data);
    }

    public function edit_post()
    {
        $data = $this->post_m->edit_post();
        echo json_encode($data);
    }

    public function get_post_by_id()
    {
        $data = $this->post_m->get_post_by_id();
        echo json_encode($data);
    }

    public function delete_post()
    {
        $data = $this->post_m->delete_post();
        echo json_encode($data);
    }
}
