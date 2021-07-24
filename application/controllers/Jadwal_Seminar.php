<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_Seminar extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        $this->load->model('seminar_model');
        $this->load->model('peserta_model');
        $this->load->library('form_validation');
	}

    // STUDENT
    public function index()
        {   
            $data['title'] = 'Student - Jadwal Seminar';
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
            $data['seminar'] = $this->seminar_model->getAllSeminarToday();

            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/student/seminar/jadwal', $data);
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
        }

    public function daftar($id)
    {   
        $data['seminar'] = $this->seminar_model->getById($id);
        $data['title'] = 'Student - Daftar Seminar';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/student/seminar/daftar', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function data() {
        $data['title'] = 'Student - Data Seminar Peserta';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        $data['seminar'] = $this->peserta_model->getAllSeminarByName($data['user']['nim']);

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/student/seminar/list', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }
    
    public function detail($id_peserta) {
        $data['title'] = 'Student - Detail Seminar Peserta';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        $data['seminar_with_pembimbing'] = $this->peserta_model->getDetailSeminarPeserta($id_peserta, $data['user']['nim']);
        $data['seminar_with_penguji1'] = $this->peserta_model->getDetailSeminarPeserta2($id_peserta);
        $data['seminar_with_penguji2'] = $this->peserta_model->getDetailSeminarPeserta3($id_peserta);
        $data['seminar_with_kategori'] = $this->peserta_model->getDetailSeminarPeserta4($id_peserta);


        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/student/seminar/detail', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function view_ticket($id_peserta) {
        $data['title'] = 'Student - Detail Seminar Peserta';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        $data['seminar'] = $this->peserta_model->getDetailSeminarPeserta($id_peserta);
        
        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/student/seminar/view_ticket', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }
}