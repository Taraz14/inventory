<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAlumni();
        $this->load->model('alumni/dashboard_model', 'dashboard');
        $this->load->model('alumni_model', 'alumni');
    }

    public function index()
    {
        $data['content']  = 'alumni';
        $data['active']   = 'alumni';
        $data['title']    = 'ALUMNI SD 1 - Alumni';
        $data['head']       = 'Data Alumni';
        $data['breadcrumb'] = 'Data Alumni';
        $data['alumni']     = $this->alumni->get();
        $this->load->view("layouts/wrapper", $data);
    }

    private function isAlumni()
    {
        if($this->session->isLoggin && $this->session->roleName == 'Alumni') {
            return true;
        }

        redirect('sign-out','refresh');
    }

}

/* End of file Alumni.php */
