<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_Peserta_Seminar');
		$this->load->model('M_Users');
	}


	public function aksi_login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
		);
		$cek_peserta = $this->M_Peserta_Seminar->cek_login("peserta_seminar", $where)->num_rows();
		$peserta = $this->M_Peserta_Seminar->select($where['email']);
		$cek_user = $this->M_Users->cek_login("users", $where)->num_rows();
		$users = $this->M_Users->select($where['email']);
		if ($cek_user && $users) {
			$data_session = array(
				'id' => $users[0]['id'],
				'nama' => $users[0]['nama'],
				'email' => $email,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);

			redirect(base_url("Admin"));
		} elseif ($cek_peserta && $peserta) {
			$data_session = array(
				'id' => $peserta[0]['id'],
				'nim' => $peserta[0]['nim'],
				'nama' => $peserta[0]['nama'],
				'email' => $email,
				'kehadiran' => $peserta[0]['kehadiran'],
				'tiket' => $peserta[0]['tiket'],
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			redirect(base_url('User'));
		} else {
			echo '<script>alert("Salah! Email dan Password salah."); window.location.href="' . base_url('Welcome') . '";</script>';;
		}
	}

	public function proses_register()
	{
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[peserta_seminar.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$errors = $this->form_validation->error_array();
			$this->session->set_flashdata('errors', $errors);
			$this->session->set_flashdata('input', $this->input->post());
			redirect('Welcome');
		} else {
			$nim = $this->input->post('nim');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$seminar_id = $this->input->post('seminar_id');
			$password = $this->input->post('password');
			$pass = md5($password);
			$data = [
				'nim' => $nim,
				'nama' => $nama,
				'email' => $email,
				'seminar_id' => $seminar_id,
				'password' => $pass,
				'tiket' => 'seminar' . time()
			];
			$insert = $this->M_Peserta_Seminar->register("peserta_seminar", $data);
			if ($insert) {
				echo '<script>alert("Sukses! Anda berhasil melakukan register. Silahkan login untuk mengakses data.");window.location.href="' . base_url('Welcome') . '";</script>';
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Welcome'));
	}
}
