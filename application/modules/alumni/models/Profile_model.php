<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model {

    public function update($data, $params)
    {
        return $this->db->update('user', $data, $params);
    }

    public function findImages($params)
    {
        return $this->db
            ->select("userImage")
            ->from("user")
            ->where($params)
            ->limit(1)
            ->get()->row();
    }


}

/* End of file Profile_model.php */
