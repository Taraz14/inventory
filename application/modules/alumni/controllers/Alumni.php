<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAlumni();
        // $this->load->model('dashboard_model', 'dashboard');
    }

    public function index()
    {
        $data['content']  = 'dashboard';
        $data['active']   = 'dashboard';
        $data['title']    = 'ALUMNI SD 1 - Alumni';
        $data['head']       = 'Dashboard';
        $data['breadcrumb'] = 'Dashboard';

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
