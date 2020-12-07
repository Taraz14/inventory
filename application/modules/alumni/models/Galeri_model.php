<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_Model {

    public function getImage(){
        $this->db->select('g.*, u.userName')
                ->from('galeri g')
                ->join('user u', 'g.userId = u.userId', 'inner');        
        return $this->db->get()->result();
            
    }

}

/* End of file Galeri_model.php */