<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function find($params)
    {
        return $this->db
            ->select('u.*, r.roleId, r.roleName')
            ->from("userRole ur")
            ->join("user u","u.userId = ur.userId", "inner")
            ->join("role r","r.roleId = ur.roleId", "inner")
            ->where($params)
            ->get();
    }

    public function set($data)
    {
        if($this->db->insert('user', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }

    public function setRole($data)
    {
        return $this->db->insert('userRole', $data);
    }

}

/* End of file AuthModel.php */
