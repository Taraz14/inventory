<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function countAlumniAll(){
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gender g', 'g.genderId = u.genderId', 'inner');
        $this->db->where('userId != 1');

        return $this->db->count_all_results();
    }

    public function countAlumni($userYears){
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gender g', 'g.genderId = u.genderId', 'inner');
        $this->db->where('userId != 1');
        $this->db->where('userYears', $userYears);
    
        return $this->db->count_all_results();
    }

    public function countGambar(){
        $this->db->select('*');
        $this->db->from('galeri');
        return $this->db->count_all_results();
    }

    public function countBerita(){
        $this->db->select('*');
        $this->db->from('berita');
        return $this->db->count_all_results();
    }

}

/* End of file Dashboard_model.php */
