<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAlumni();
        $this->load->model('alumni/dashboard_model', 'dashboard');
    }

    public function index()
    {
        $userYears = $this->session->userdata('years');
        $data['content']  = 'dashboard';
        $data['active']   = 'dashboard';
        $data['title']    = 'ALUMNI SD 1 - Alumni';
        $data['head']       = 'Dashboard';
        $data['breadcrumb'] = 'Dashboard';
        $data['countAlumniAll']  = $this->dashboard->countAlumniAll();
        $data['countAlumni'] = $this->dashboard->countAlumni($userYears);
        $data['countGambar'] = $this->dashboard->countGambar();
        $data['countBerita'] = $this->dashboard->countBerita();
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
