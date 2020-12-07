<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni_model extends CI_Model {

    public function get($limit = false){
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gender g', 'g.genderId = u.genderId', 'inner');
        $this->db->where('userId != 1');
        $this->db->where('userYears', $this->session->userdata('years'));
        
        if($limit){
            $this->db->limit(10);
        }
        return $this->db->get()->result();
    } 

}

/* End of file Alumni_model.php */
