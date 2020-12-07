<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{

    public function getGender()
    {
        $this->db->select('*');
        $this->db->from('gender');
        return $this->db->get()->result();
    }

    public function set($data)
    {
        return $this->db->insert('user', $data);
    }

    public function setRole($data)
    {
        return $this->db->insert('userrole', $data);
        // return $this->db->insert_id(); 
    }

    public function get($limit = false)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gender g', 'g.genderId = u.genderId', 'inner');
        $this->db->where('userId != 1');

        if ($limit) {
            $this->db->limit(10);
        }
        return $this->db->get()->result();
    }

    public function findUser($params)
    {
        return $this->db
            ->select("*")
            ->from("user")
            ->where($params)
            ->limit(1)
            ->get();
    }

    public function getAlumni()
    {
        $limit = !empty($this->input->get('limit')) ? $this->input->get('limit') : 9;
        $order = !empty($this->input->get('orderBy')) ? $this->input->get('orderBy') : 'userYears';
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gender g', 'g.genderId = u.genderId', 'inner');
        $this->db->limit($limit);
        $this->db->order_by($order, 'asc');
        return $this->db->get()->result();
    }

    public function update($data, $params)
    {
        return $this->db->update('user', $data, $params);
    }

    public function delete($params)
    {
        $del_user = $this->db->delete('user', $params);
        $del_role = $this->db->delete('userrole', $params);
        return array($del_user, $del_role);
    }

    public function countAlumni()
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('gender g', 'g.genderId = u.genderId', 'inner');
        $this->db->where('userId != 1');

        return $this->db->count_all_results();
    }

    public function countGambar()
    {
        $this->db->select('*');
        $this->db->from('galeri');
        return $this->db->count_all_results();
    }

    public function countBerita()
    {
        $this->db->select('*');
        $this->db->from('berita');
        return $this->db->count_all_results();
    }
}

/* End of file Dashboard_model.php */
