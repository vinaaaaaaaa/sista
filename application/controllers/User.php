<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('email') && !$this->session->userdata('nim')) {
			$this->session->sess_destroy();
			redirect(base_url("Welcome"));
		}
		$this->load->library('form_validation');
		$this->load->model('M_Peserta_Seminar');
	}
	public function index()
	{
		$data["peserta_seminars"] = $this->M_Peserta_Seminar->getAll();
		$this->load->view('user/index', $data);
	}
}
