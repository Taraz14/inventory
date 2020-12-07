<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function get($userId){
        $this->db->select('u.userName, b.*');
        $this->db->from('berita b');
        $this->db->join('user u', 'u.userId = b.userId', 'left');
        $this->db->where('b.userId', $userId);
        return $this->db->get()->result();
    }

    public function set($data){
        return $this->db->insert('berita', $data);
    }

    public function delete($params)
    {
        return $this->db->delete('berita', $params);
    }

}

/* End of file Berita_model.php */
