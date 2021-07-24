<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('dosen_model');
		$this->load->model('seminar_model');
	}

    public function index()
	{   
		$data['title'] = 'Dashboard';
		$data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
		$data['total_dosen'] = $this->dosen_model->getCount();
		$data['total_seminar_hari_ini'] = $this->seminar_model->getCount();
		
        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
		$this->load->view('pages/admin/index');
		$this->load->view('components/modal_logout');
        $this->load->view('components/footer');
	}

}