<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("M_Seminar");
		$this->load->model("M_Dosen");
	}
	public function index()
	{
		$data["seminars"] = $this->M_Seminar->getAll();
		$data["dosen"] = $this->M_Dosen->getAll();
		$this->load->view('index', $data);
	}

	public function jadwal()
	{
		$data["seminars"] = $this->M_Seminar->getAll();
		$data["dosen"] = $this->M_Dosen->getAll();
		$this->load->view('jadwal', $data);
	}
}
