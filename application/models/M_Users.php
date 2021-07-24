<?php

class M_Users extends CI_Model
{

    public function select($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
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
