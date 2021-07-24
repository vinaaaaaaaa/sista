<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_Seminar extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('kategori_seminar_model');
		$this->load->library('form_validation');
	}


    public function index() {
            $data['title'] = 'Ketegori Seminar';
            $data['kategori_seminar'] = $this->kategori_seminar_model->getAll();
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

            
            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/admin/seminar/kategori/list', $data);
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
        }

        public function tambah() {
            $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[kategori_seminar.nama]', [
                'is_unique' => 'This name has already exist!'
            ]);
    
            if($this->form_validation->run() == false) {
                $data['title'] = 'Tambah Kategori Seminar';
                $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
    
                $this->load->view('components/sidebar', $data);
                $this->load->view('components/header');
                $this->load->view('pages/admin/seminar/kategori/tambah');
                $this->load->view('components/modal_logout');
                $this->load->view('components/footer');
            }  else {
                $data = [
                    'nama' => htmlspecialchars( $this->input->post('name', true)),
                ];
                $this->kategori_seminar_model->insert($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New data has been added.</div>');
                redirect('kategori_seminar');
        }
        }
    
        public function edit($id) {
            $data['kategori_seminar'] = $this->kategori_seminar_model->getById($id);
            $data['title'] = 'Edit Kategori Seminar';
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
    
            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/admin/seminar/kategori/edit', $data);
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
        }
    
        public function update() {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
    
            if($this->form_validation->run() == false) {
                $id_kategori = $this->input->post('id', true);
                $data['kategori_seminar'] = $this->kategori_seminar_model->getById($id_kategori);
                $data['title'] = 'Edit Kategori Seminar';
                $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));
    
                $this->load->view('components/sidebar', $data);
                $this->load->view('components/header');
                $this->load->view('pages/admin/seminar/kategori/edit', $data);
                $this->load->view('components/modal_logout');
                $this->load->view('components/footer');
        } else {
            $id_kategori = $this->input->post('id', true);
            $data = [
                'nama' => htmlspecialchars( $this->input->post('name', true)),
            ];
            $this->kategori_seminar_model->update($data, $id_kategori);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data has been updated.</div>');
            redirect('kategori_seminar');
        }
        }
    
        public function delete($id) {
            $this->kategori_seminar_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Data has been deleted.</div>');
            redirect('kategori_seminar');
        }

}