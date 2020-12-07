<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings_model extends CI_Model {

    public function update($data, $params)
    {
        return $this->db->update('user', $data, $params);
    }

}

/* End of file Settings_model.php */
