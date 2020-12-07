<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita_model extends CI_Model {

    public function get(){
        $this->db->select('u.userName, b.*');
        $this->db->from('berita b');
        $this->db->join('user u', 'u.userId = b.userId', 'left');
        // $this->db->where('b.userId', $userId);
        return $this->db->get()->result();
    }

    public function lengkap($id){
        $this->db->select('*');
        $this->db->from('berita b');
        $this->db->join('user u', 'u.userId = b.userId', 'left');
        $this->db->where('b.beritaId', $id);
        return $this->db->get()->row();
    }


}

/* End of file Berita_model.php */
