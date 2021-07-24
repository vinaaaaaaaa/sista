<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dosen extends CI_Model
{
    private $_table = "dosen";

    public $id;
    public $nidn;
    public $nama;

    public function rules()
    {
        return [
            [
                'field' => 'nidn',
                'label' => 'NIDN',
                'rules' => 'required'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nidn = $post["nidn"];
        $this->nama = $post["nama"];
        return $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->id = $id;
        $this->nidn = $post["nidn"];
        $this->nama = $post["nama"];
        return $this->db->update($this->_table, $this, array('id' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
