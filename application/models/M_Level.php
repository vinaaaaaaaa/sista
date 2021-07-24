<?php

class M_Level extends CI_Model
{

    private $table = 'level';


    public function getAll()
    {
        $roles = $this->db->get($this->table);
        return $roles;
    }

    public function getAllExcAdmin()
    {
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('id !=', 1);
        $role = $this->db->get();

        return $role;
    }
}
