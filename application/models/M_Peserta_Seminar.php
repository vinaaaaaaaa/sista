<?php

class M_Peserta_Seminar extends CI_Model
{

    private $_table = 'peserta_seminar';

    public $id;
    public $nim;
    public $nama;
    public $email;
    public $seminar_id;
    public $kehadiran;
    public $password;
    public $tiket;

    public function rules()
    {
        return [
            [
                'field' => 'nim',
                'label' => 'NIM',
                'rules' => 'required'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'required'
            ],
            [
                'field' => 'seminar_id',
                'label' => 'Seminar',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
        ];
    }

    public function rulesKehadiran()
    {
        return [
            [
                'field' => 'kehadiran',
                'label' => 'Kehadiran',
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

    // public function save()
    // {
    //     $post = $this->input->post();
    //     $this->nim = $post["nim"];
    //     $this->nama = $post["nama"];
    //     $this->email = $post["email"];
    //     $this->seminar_id = $post["seminar_id"];
    //     $this->password = $post["password"];
    //     return $this->db->insert($this->_table, $this);
    // }

    public function update($id)
    {
        $post = $this->input->post();
        $this->id = $id;
        // $this->nim = $post["nim"];
        // $this->nama = $post["nama"];
        // $this->email = $post["email"];
        // $this->seminar_id = $post["seminar_id"];
        $kehadiran = $post["kehadiran"];
        $where = array(
            'id' => $id
        );
        $data = array(
            'kehadiran' => $kehadiran
        );
        $return = $this->db->where($where);
        $return = $this->db->update('peserta_seminar', $data);
        return $return;

        // return $this->db->set('kehadiran', $post['kehadiran'])
        //     ->where('id', $id)
        //     ->update($this->_table, $this, array('id' => $id));
    }

    // public function delete($id)
    // {
    //     return $this->db->delete($this->_table, array("id" => $id));
    // }

    public function select($email)
    {
        $sql = "SELECT * FROM peserta_seminar WHERE email = '$email'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function register($table, $data)
    {
        return $this->db->insert($table, $data);
    }
}
