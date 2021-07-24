<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('peserta_model');
		$this->load->library('form_validation');
        // $this->load->library('user_agent');
	}

    public function tambah() {
        $this->form_validation->set_rules('nim', 'NIDN', 'required|trim');
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('prodi', 'Prodi', 'required|trim');

        
        if($this->form_validation->run() == false) {
           redirect($_SERVER['HTTP_REFERER']);
        }  else {
            $data = [
                'nim' =>  htmlspecialchars($this->input->post('nim', true)),
                'nama' => htmlspecialchars( $this->input->post('name', true)),
                'prodi' => htmlspecialchars( $this->input->post('prodi', true)),
                'seminar_id' => htmlspecialchars( $this->input->post('seminar_id', true)),
                'kehadiran' => 2,
            ];
            $this->peserta_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations! You have registered for the seminar.</div>');
            redirect('jadwal_seminar/data');
    }
    }

    public function edit($id) {
        $data['peserta'] = $this->peserta_model->getById($id);
        $data['title'] = 'Edit Peserta Seminar';
        $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

        $this->load->view('components/sidebar', $data);
        $this->load->view('components/header');
        $this->load->view('pages/admin/seminar/peserta/edit', $data);
        $this->load->view('components/modal_logout');
        $this->load->view('components/footer');
    }

    public function update() {
        $this->form_validation->set_rules('status', 'Status', 'required|trim');

        if($this->form_validation->run() == false) {
            $id_peserta = $this->input->post('id', true);
            $data['peserta'] = $this->peserta_model->getById($id_peserta);
            $data['title'] = 'Edit Peserta Seminar';
            $data['user'] = $this->user_model->checkUser($this->session->userdata('email'));

            $this->load->view('components/sidebar', $data);
            $this->load->view('components/header');
            $this->load->view('pages/admin/seminar/peserta/edit', $data);
            $this->load->view('components/modal_logout');
            $this->load->view('components/footer');
    } else {
        $id_peserta = $this->input->post('id', true);
        $data = [
            'kehadiran' =>  htmlspecialchars($this->input->post('status', true)),
        ];
        $this->peserta_model->update($data, $id_peserta);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data has been updated.</div>');
        redirect('seminar');
        
    }
    }

    public function delete($id) {
        $this->peserta_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Data has been deleted.</div>');
        redirect($_SERVER['HTTP_REFERER']);
        
    }

}