<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri_model extends CI_Model
{

    public function upload($data)
    {
        return $this->db->insert('galeri', $data);
    }

    public function getImage()
    {
        $this->db->select('g.*, u.userName')
            ->from('galeri g')
            ->join('user u', 'g.userId = u.userId', 'inner');
        return $this->db->get()->result();
    }

    public function findImages($params)
    {
        return $this->db
            ->select("foto, deskripsi")
            ->from("galeri g")
            ->where($params)
            ->limit(1)
            ->get()->row();
    }

    public function deleteImage($params)
    {
        $del_user = $this->db->delete('galeri', $params);
        return array($del_user);
    }
}

/* End of file Galeri_model.php */
