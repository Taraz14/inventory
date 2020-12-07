<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan_model extends CI_Model {

    public function update($data, $params)
    {
        return $this->db->update('user', $data, $params);
    }

    public function emailUpdate($data, $params){
        return $this->db->update('option', $data, $params);
    }

}

/* End of file Pengaturan_model.php */
