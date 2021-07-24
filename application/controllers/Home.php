<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('seminar_model');
	}

    public function index()
	{   
        $data['title'] = 'Home';
		$data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
		$data['seminar'] = $this->seminar_model->getSeminarToday();

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
		$this->load->view('pages/student/index', $data);
		$this->load->view('components/modal_logout');
        $this->load->view('components/footer');
	}
	

}