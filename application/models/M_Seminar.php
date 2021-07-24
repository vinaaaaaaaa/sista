<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Seminar extends CI_Model
{

    private $_table = "seminar_ta";

    public $id;
    public $semester;
    public $tanggal;
    public $jam;
    public $kategori_seminar_id;
    public $nim;
    public $nama_mahasiswa;
    public $judul;
    public $pembimbing_id;
    public $penguji1_id;
    public $penguji2_id;
    public $nilai_pembimbing;
    public $nilai_penguji1;
    public $nilai_penguji2;
    public $lokasi;
    public $nilai_akhir;

    public function rules()
    {
        return [
            [
                'field' => 'semester',
                'label' => 'Semester',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal',
                'label' => 'Tanggal',
                'rules' => 'required'
            ],
            [
                'field' => 'jam',
                'label' => 'Jam',
                'rules' => 'required'
            ],
            [
                'field' => 'kategori_seminar_id',
                'label' => 'Kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'nim',
                'label' => 'NIM',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_mahasiswa',
                'label' => 'Nama Mahasiswa',
                'rules' => 'required'
            ],
            [
                'field' => 'judul',
                'label' => 'Judul',
                'rules' => 'required'
            ],
            [
                'field' => 'lokasi',
                'label' => 'Lokasi',
                'rules' => 'required'
            ],
        ];
    }
    public function rules_nilai()
    {
        return [
            [
                'field' => 'nilai_pembimbing',
                'label' => 'Nilai Pembimbing',
                'rules' => 'required'
            ],
            [
                'field' => 'nilai_penguji1',
                'label' => 'Nilai Penguji 1',
                'rules' => 'required'
            ],
            [
                'field' => 'nilai_penguji2',
                'label' => 'Nilai Penguji 2',
                'rules' => 'required'
            ],
        ];
    }


    public function getAll()
    {
        $select = $this->db->select('seminar_ta.id as id, 
         seminar_ta.semester as semester, 
         seminar_ta.tanggal as tanggal,
         seminar_ta.jam as jam,
         seminar_ta.kategori_seminar_id as kategori_seminar_id,
         seminar_ta.nim as nim,
         seminar_ta.nama_mahasiswa as nama_mahasiswa,
         seminar_ta.judul as judul,
         seminar_ta.pembimbing_id as pembimbing_id,
         seminar_ta.penguji1_id as penguji1_id,
         seminar_ta.penguji2_id as penguji2_id,
         seminar_ta.nilai_pembimbing as nilai_pembimbing,
         seminar_ta.nilai_penguji1 as nilai_penguji1,
         seminar_ta.nilai_penguji2 as nilai_penguji2,
         seminar_ta.lokasi as lokasi,
         seminar_ta.nilai_akhir as nilai_akhir,
         kategori_seminar.nama as nama_kategori,
         dosen.nidn as nidn_dosen,
         dosen.nama as nama_dosen')
            ->from('seminar_ta as seminar_ta')
            ->join('dosen as dosen', 'dosen.id = seminar_ta.pembimbing_id', 'LEFT')
            ->join('kategori_seminar as kategori_seminar', 'kategori_seminar.id = seminar_ta.kategori_seminar_id', 'LEFT')
            ->get();
        return $select->result();
    }

    public function getById($id)
    {
        $select = $this->db->select('seminar_ta.id as id, 
         seminar_ta.semester as semester, 
         seminar_ta.tanggal as tanggal,
         seminar_ta.jam as jam,
         seminar_ta.kategori_seminar_id as kategori_seminar_id,
         seminar_ta.nim as nim,
         seminar_ta.nama_mahasiswa as nama_mahasiswa,
         seminar_ta.judul as judul,
         seminar_ta.pembimbing_id as pembimbing_id,
         seminar_ta.penguji1_id as penguji1_id,
         seminar_ta.penguji2_id as penguji2_id,
         seminar_ta.lokasi as lokasi,
         seminar_ta.nilai_pembimbing as nilai_pembimbing,
         seminar_ta.nilai_penguji1 as nilai_penguji1,
         seminar_ta.nilai_penguji2 as nilai_penguji2,
         seminar_ta.nilai_akhir as nilai_akhir,
         kategori_seminar.nama as nama_kategori,
         dosen.nidn as nidn_dosen,
         dosen.nama as nama_dosen')
            ->from('seminar_ta as seminar_ta')
            ->join('dosen as dosen', 'dosen.id = seminar_ta.pembimbing_id', 'LEFT')
            ->join('kategori_seminar as kategori_seminar', 'kategori_seminar.id = seminar_ta.kategori_seminar_id', 'LEFT')
            ->where('seminar_ta.id', $id)
            ->get();
        return $select->result_array();
    }

    public function saveSeminar()
    {
        $post = $this->input->post();
        $this->semester = $post["semester"];
        $this->tanggal = $post["tanggal"];
        $this->jam = $post["jam"];
        $this->kategori_seminar_id = $post["kategori_seminar_id"];
        $this->nim = $post["nim"];
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $this->judul = $post["judul"];
        $this->pembimbing_id = $post["pembimbing_id"];
        $this->penguji1_id = $post["penguji1_id"];
        $this->penguji2_id = $post["penguji2_id"];
        $this->lokasi = $post["lokasi"];
        return $this->db->insert($this->_table, $this);
    }
    public function updateSeminar($id)
    {
        $post = $this->input->post();
        $this->id = $id;
        $this->semester = $post["semester"];
        $this->tanggal = $post["tanggal"];
        $this->jam = $post["jam"];
        $this->kategori_seminar_id = $post["kategori_seminar_id"];
        $this->nim = $post["nim"];
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $this->judul = $post["judul"];
        $this->pembimbing_id = $post["pembimbing_id"];
        $this->penguji1_id = $post["penguji1_id"];
        $this->penguji2_id = $post["penguji2_id"];
        $this->lokasi = $post["lokasi"];
        $this->nilai_pembimbing = $post["nilai_pembimbing"];
        $this->nilai_penguji1 = $post["nilai_penguji1"];
        $this->nilai_penguji2 = $post["nilai_penguji2"];
        $nilai = $this->nilai_pembimbing * $this->nilai_penguji1 * $this->nilai_penguji2 / 3;
        $this->nilai_akhir = $nilai;
        return $this->db->update($this->_table, $this, array('id' => $id));
    }

    public function addNilai($id)
    {
        $post = $this->input->post();
        $this->id = $id;
        $this->semester = $post["semester"];
        $this->tanggal = $post["tanggal"];
        $this->jam = $post["jam"];
        $this->kategori_seminar_id = $post["kategori_seminar_id"];
        $this->nim = $post["nim"];
        $this->nama_mahasiswa = $post["nama_mahasiswa"];
        $this->judul = $post["judul"];
        $this->pembimbing_id = $post["pembimbing_id"];
        $this->penguji1_id = $post["penguji1_id"];
        $this->penguji2_id = $post["penguji2_id"];
        $this->lokasi = $post["lokasi"];
        $this->nilai_pembimbing = $post["nilai_pembimbing"];
        $this->nilai_penguji1 = $post["nilai_penguji1"];
        $this->nilai_penguji2 = $post["nilai_penguji2"];
        $nilai = ($this->nilai_pembimbing + $this->nilai_penguji1 + $this->nilai_penguji2) / 3;
        $this->nilai_akhir = $nilai;
        return $this->db->update($this->_table, $this, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
