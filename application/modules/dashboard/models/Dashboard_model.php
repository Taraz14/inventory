<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function getGender(){
        $this->db->select('*');
        $this->db->from('gender');
        return $this->db->get()->result();
    }

    public function set($data){
        return $this->db->insert('user', $data);
    }
}

/* End of file Dashboard_model.php */
