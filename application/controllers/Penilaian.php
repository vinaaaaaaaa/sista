<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        $this->load->model('detail_penilaian_model');
		$this->load->model('dosen_model');
		$this->load->model('seminar_model');
        $this->load->model('penilaian_model');
        $this->load->library('form_validation');

	}

    public function index() {
		$data['title'] = 'Data Penilaian';
		$data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        $data['penilaian'] = $this->detail_penilaian_model->getAll();

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
		$this->load->view('pages/admin/penilaian/list', $data);
		$this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function tambah() {
        $this->form_validation->set_rules('penilaian', 'Penilaian', 'required|trim');
        $this->form_validation->set_rules('seminar', 'Seminar', 'required|trim');
        $this->form_validation->set_rules('dosen', 'Dosen', 'required|trim');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required|trim');

        if($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data Penilaian';
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
            $data['seminar'] = $this->seminar_model->getAll();
            $data['dosen'] = $this->dosen_model->getAll();
            $data['kategori_penilaian'] = $this->penilaian_model->getAll();


            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/admin/penilaian/tambah', $data);
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
        } else {
            $data = [
                'penilaian_id' =>  htmlspecialchars($this->input->post('penilaian', true)),
                'dosen_id' => htmlspecialchars( $this->input->post('dosen', true)),
                'seminar_id' => htmlspecialchars( $this->input->post('seminar', true)),
                'nilai' => htmlspecialchars( $this->input->post('nilai', true))
            ];

            $this->detail_penilaian_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New data has been added.</div>');
            redirect('penilaian');
        }
    }

    public function detail($id_penilaian) {
        $data['title'] = 'Detail Penilaian';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        $data['penilaian_with_kategori'] = $this->detail_penilaian_model->getDetailWithKategori($id_penilaian);
        $data['penilaian_with_dosen'] = $this->detail_penilaian_model->getDetailWithDosen($id_penilaian);
    
    
        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/penilaian/detail', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function edit($id_penilaian) {
        $data['title'] = 'Edit Data Penilaian';
        $data['penilaian'] = $this->detail_penilaian_model->getById($id_penilaian);
        $data['seminar'] = $this->seminar_model->getAll();
        $data['dosen'] = $this->dosen_model->getAll();
        $data['kategori_penilaian'] = $this->penilaian_model->getAll();
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/penilaian/edit', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function update() {
        $this->form_validation->set_rules('penilaian', 'Penilaian', 'required|trim');
        $this->form_validation->set_rules('seminar', 'Seminar', 'required|trim');
        $this->form_validation->set_rules('dosen', 'Dosen', 'required|trim');
        $this->form_validation->set_rules('nilai', 'Nilai', 'required|trim');
    
        if($this->form_validation->run() == false) {
            $data['title'] = 'Edit Data Penilaian';
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
            $data['seminar'] = $this->seminar_model->getAll();
            $data['dosen'] = $this->dosen_model->getAll();
            $data['kategori_penilaian'] = $this->penilaian_model->getAll();
    
    
            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/admin/penilaian/edit', $data);
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
    } else {
        $id_penilaian = $this->input->post('id', true);
        $data = [
            'penilaian_id' =>  htmlspecialchars($this->input->post('penilaian', true)),
            'dosen_id' => htmlspecialchars( $this->input->post('dosen', true)),
            'seminar_id' => htmlspecialchars( $this->input->post('seminar', true)),
            'nilai' => htmlspecialchars( $this->input->post('nilai', true))
        ];
        $this->detail_penilaian_model->update($data, $id_penilaian);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data has been updated.</div>');
        redirect('penilaian');
        
    }
    }

    public function delete($id) {
        $this->detail_penilaian_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data has been deleted.</div>');
        redirect('penilaian');
        
    }
}