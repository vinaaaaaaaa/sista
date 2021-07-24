<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
        $this->load->model('user_role_model');
        $this->load->library('form_validation');
	}

    public function index() {
        $data['title'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $this->user_model->getAllMahasiswa();
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
        

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/mahasiswa/list', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function edit($id) {
        $data['title'] = 'Edit Data Mahasiswa';
        $data['roles'] = $this->user_role_model->getAllExcAdmin();
        $data['mahasiswa'] = $this->user_model->getById($id);
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/mahasiswa/edit', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function update() {
        $this->form_validation->set_rules('role', 'Role', 'required|trim');

        if($this->form_validation->run() == false) {
            $id_user = $this->input->post('id', true);
            $data['title'] = 'Edit Data Mahasiswa';
            $data['mahasiswa'] = $this->user_model->getById($id_user);
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/admin/mahasiswa/edit', $data);
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
    } else {
        $id_user = $this->input->post('id', true);
        $data = [
            'role_id' =>  htmlspecialchars($this->input->post('role', true)),
        ];
        $this->user_model->update($data, $id_user);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data has been updated.</div>');
        redirect('mahasiswa');
    }
    }

    public function delete($id) {
        $this->user_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data has been deleted.</div>');
        redirect('mahasiswa');
    }
}