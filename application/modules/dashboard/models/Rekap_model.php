<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap_model extends CI_Model {

    public function get($id, $limit = false){
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gender g', 'g.genderId = u.genderId', 'inner');
        $this->db->where('userYears', $id);
        $this->db->where('userId != 1');
        
        if($limit){
            $this->db->limit(10);
        }
        return $this->db->get()->result();
    }

    public function getYears(){
        $this->db->select('userYears');
        $this->db->from('user');
        $this->db->group_by('userYears');
        return $this->db->get()->result();
    }

    public function getAlumni(){
        $limit = !empty($this->input->get('limit')) ? $this->input->get('limit') : 9;
        $order = !empty($this->input->get('orderBy')) ? $this->input->get('orderBy') : 'userYears';
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gender g', 'g.genderId = u.genderId', 'inner');   
        $this->db->limit($limit);
        $this->db->order_by($order, 'asc');
        return $this->db->get()->result();
    }


}

/* End of file Rekap_model.php */
