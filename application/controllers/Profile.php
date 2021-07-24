<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{    
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        $data['title'] = 'My Profile';
        
        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
		$this->load->view('pages/profile/index');
		$this->load->view('components/modal_logout');
        $this->load->view('components/footer');
	}
}