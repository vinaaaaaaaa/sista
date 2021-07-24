<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email') && $this->session->userdata('nim')) {
            $this->session->sess_destroy();
            redirect(base_url("Welcome"));
        }
        $this->load->library('form_validation');
        $this->load->model("M_Penilaian");
        $this->load->model("M_Kategori");
        $this->load->model("M_Dosen");
        $this->load->model("M_Seminar");
        $this->load->model("M_Peserta_Seminar");
    }

    function index()
    {
        $data["peserta_seminars"] = $this->M_Peserta_Seminar->getAll();
        $this->load->view('admin/index', $data);
    }

    // Penilaian

    function inputPenilaian()
    {
        $this->load->view('admin/Penilaian/inputPenilaian');
    }

    function updatePeserta($id)
    {
        if (!isset($id)) redirect(base_url('Admin'));

        $peserta = $this->M_Peserta_Seminar;
        $validation = $this->form_validation;
        $validation->set_rules($peserta->rulesKehadiran());

        if ($validation->run()) {
            $peserta->update($id);
            $this->session->set_flashdata('success', 'Berhasil diupdate');
            redirect(site_url('Admin'));
        }
    }

    function editPeserta($id)
    {
        $peserta = $this->M_Peserta_Seminar;
        $data["peserta"] = $peserta->getById($id);
        if (!$data["peserta"]) show_404();

        $this->load->view("Admin/editPeserta", $data);
    }

    public function addPenilaian()
    {
        $Penilaian = $this->M_Penilaian;
        $validation = $this->form_validation;
        $validation->set_rules($Penilaian->rules());

        if ($validation->run()) {
            $Penilaian->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect(base_url("Admin/Penilaian"));
    }

    function Penilaian()
    {
        $data["penilaian"] = $this->M_Penilaian->getAll();
        $this->load->view('Admin/Penilaian/Penilaian', $data);
    }

    function updatePenilaian($id)
    {
        if (!isset($id)) redirect(base_url('Admin/editPenilaian'));

        $Penilaian = $this->M_Penilaian;
        $validation = $this->form_validation;
        $validation->set_rules($Penilaian->rules());

        if ($validation->run()) {
            $Penilaian->update($id);
            $this->session->set_flashdata('success', 'Berhasil diupdate');
            redirect(site_url('Admin/Penilaian'));
        }
    }

    function deletePenilaian($id)
    {
        if (!isset($id)) show_404();

        if ($this->M_Penilaian->delete($id)) {
            $this->session->set_flashdata('danger', 'Berhasil dihapus');
            redirect(site_url('Admin/Penilaian'));
        }
    }

    function editPenilaian($id)
    {
        $Penilaian = $this->M_Penilaian;
        $data["penilaian"] = $Penilaian->getById($id);
        if (!$data["penilaian"]) show_404();

        $this->load->view("Admin/Penilaian/editPenilaian", $data);
    }

    // Kategori

    function inputKategori()
    {
        $this->load->view('admin/Kategori/inputKategori');
    }
    public function addKategori()
    {
        $Kategori = $this->M_Kategori;
        $validation = $this->form_validation;
        $validation->set_rules($Kategori->rules());

        if ($validation->run()) {
            $Kategori->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect(base_url("Admin/Kategori"));
    }

    function Kategori()
    {
        $data["kategori"] = $this->M_Kategori->getAll();
        $this->load->view('Admin/Kategori/Kategori', $data);
    }

    function updateKategori($id)
    {
        if (!isset($id)) redirect(base_url('Admin/editKategori'));

        $Kategori = $this->M_Kategori;
        $validation = $this->form_validation;
        $validation->set_rules($Kategori->rules());

        if ($validation->run()) {
            $Kategori->update($id);
            $this->session->set_flashdata('success', 'Berhasil diupdate');
            redirect(site_url('Admin/Kategori'));
        }
    }

    function deleteKategori($id)
    {
        if (!isset($id)) show_404();

        if ($this->M_Kategori->delete($id)) {
            $this->session->set_flashdata('danger', 'Berhasil dihapus');
            redirect(site_url('Admin/Kategori'));
        }
    }

    function editKategori($id)
    {
        $Kategori = $this->M_Kategori;
        $data["kategori"] = $Kategori->getById($id);
        if (!$data["kategori"]) show_404();

        $this->load->view("Admin/Kategori/editKategori", $data);
    }

    // Dosen

    function inputDosen()
    {
        $this->load->view('admin/Dosen/inputDosen');
    }

    public function addDosen()
    {
        $Dosen = $this->M_Dosen;
        $validation = $this->form_validation;
        $validation->set_rules($Dosen->rules());

        if ($validation->run()) {
            $Dosen->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        redirect(base_url("Admin/Dosen"));
    }

    function Dosen()
    {
        $data["dosen"] = $this->M_Dosen->getAll();
        $this->load->view('Admin/Dosen/Dosen', $data);
    }

    function updateDosen($id)
    {
        if (!isset($id)) redirect(base_url('Admin/editDosen'));

        $Dosen = $this->M_Dosen;
        $validation = $this->form_validation;
        $validation->set_rules($Dosen->rules());

        if ($validation->run()) {
            $Dosen->update($id);
            $this->session->set_flashdata('success', 'Berhasil diupdate');
            redirect(site_url('Admin/Dosen'));
        }
    }

    function deleteDosen($id)
    {
        if (!isset($id)) show_404();

        if ($this->M_Dosen->delete($id)) {
            $this->session->set_flashdata('danger', 'Berhasil dihapus');
            redirect(site_url('Admin/Dosen'));
        }
    }

    function editDosen($id)
    {
        $Dosen = $this->M_Dosen;
        $data["dosen"] = $Dosen->getById($id);
        if (!$data["dosen"]) show_404();

        $this->load->view("Admin/Dosen/editDosen", $data);
    }

    // Seminar TA

    function inputSeminar()
    {
        $data["dosen"] = $this->M_Dosen->getAll();
        $data["kategori"] = $this->M_Kategori->getAll();
        $this->load->view('admin/Seminar/inputSeminar', $data);
    }

    function addSeminar()
    {
        $Seminar = $this->M_Seminar;
        $validation = $this->form_validation;
        $validation->set_rules($Seminar->rules());

        if ($validation->run()) {
            $Seminar->saveSeminar();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(base_url("Admin/Seminar"));
        } else {
            $this->session->set_flashdata('danger', 'Tidak Berhasil');
            redirect(base_url("Admin/inputSeminar"));
        }
    }

    function Seminar()
    {
        // var_dump($this->M_content->getAll());
        // die();
        $data["seminar"] = $this->M_Seminar->getAll();
        $data["dosen"] = $this->M_Dosen->getAll();
        $this->load->view('admin/Seminar/Seminar', $data);
    }

    function updateSeminar($id)
    {
        if (!isset($id)) redirect(base_url('Admin/editSeminar'));

        $Seminar = $this->M_Seminar;
        $validation = $this->form_validation;
        $validation->set_rules($Seminar->rules());

        if ($validation->run()) {
            $Seminar->updateSeminar($id);
            $this->session->set_flashdata('success', 'Berhasil diupdate');
            redirect(site_url('Admin/Seminar'));
        }
    }



    function editSeminar($id)
    {
        $Seminar = $this->M_Seminar;
        $data["seminar"] = $Seminar->getById($id);
        if (!$data["seminar"]) show_404();
        $data["dosen"] = $this->M_Dosen->getAll();
        if (!$data["dosen"]) show_404();
        $data["kategori"] = $this->M_Kategori->getAll();
        if (!$data["kategori"]) show_404();

        $this->load->view("admin/Seminar/editSeminar", $data);
    }

    function updateNilai($id)
    {
        $seminar = $this->M_Seminar;
        $validation = $this->form_validation;
        $validation->set_rules($seminar->rules_nilai());

        if ($validation->run()) {
            $seminar->addNilai($id);
            $this->session->set_flashdata('success', 'Berhasil disimpan');
            redirect(base_url("Admin/Seminar"));
        } else {
            $this->session->set_flashdata('danger', 'Tidak Berhasil');
            redirect(base_url("Admin/updateNilai/" . $id));
        }
    }

    function nilaiSeminar($id)
    {
        $seminar = $this->M_Seminar;
        $data["seminar"] = $seminar->getById($id);

        $this->load->view("admin/Seminar/nilaiSeminar", $data);
    }

    function deleteSeminar($id)
    {
        if (!isset($id)) show_404();

        if ($this->M_Seminar->delete($id)) {
            $this->session->set_flashdata('danger', 'Berhasil dihapus');
            redirect(site_url('Admin/Seminar'));
        }
    }
}
