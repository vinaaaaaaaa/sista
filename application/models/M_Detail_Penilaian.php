<?php

class M_Detail_Penilaian extends CI_Model
{

    private $table = 'detail_penilaian';

    public function getAll()
    {
        $select = $this->db->select('detail_penilaian.id as id, 
        detail_penilaian.penilaian_id as penilaian_id,
        detail_penilaian.dosen_id as dosen_id, 
        detail_penilaian.seminar_id as seminar_id,
        wisata.nama as nama,
        testimoni.user_id as user_id,
        users.nama as nama,
        users.email as email')
            ->from('testimoni as testimoni')
            ->join('wisata as wisata', 'wisata.id = testimoni.wisata_id', 'LEFT')
            ->join('users as users', 'users.id = testimoni.user_id', 'LEFT')
            ->get();
        return $select->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ["id" => $id]);
    }


    public function getDetailWithKategori($id_penilaian, $nim = '')
    {
        $this->db->join('penilaian', 'penilaian.id = detail_penilaian.penilaian_id');
        $this->db->join('seminar_ta', 'seminar_ta.id = detail_penilaian.seminar_id');
        $this->db->where('detail_penilaian.id', $id_penilaian);
        if ($nim != '') {
            $this->db->where('seminar_ta.nim', $nim);
        }
        $penilaian = $this->db->get($this->table)->row();
        return $penilaian;
    }

    public function getDetailWithDosen($id_penilaian, $nim = '')
    {
        $this->db->join('dosen', 'dosen.id = detail_penilaian.dosen_id');
        $this->db->join('seminar_ta', 'seminar_ta.id = detail_penilaian.seminar_id');
        $this->db->where('detail_penilaian.id', $id_penilaian);
        if ($nim != '') {
            $this->db->where('seminar_ta.nim', $nim);
        }
        $penilaian = $this->db->get($this->table)->row();
        return $penilaian;
    }
}
