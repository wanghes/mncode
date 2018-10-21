<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('cate_model');
        // Your own constructor code
    }
	
	public function index()
	{
		$data['data'] = [1,2,3,4,5,6,7,8,9];
		$this->load->view('inc/header');
		$this->load->view('index', $data);
		$this->load->view('inc/footer');
	}


	// public function detail($cate, $id)
	public function detail()
	{


		//var_dump($this->cate_model->getItems());
		// echo $sandals;
		//echo $id
		$this->load->view('inc/header');
		$this->load->view('detail');
		$this->load->view('inc/footer');
	}
}


