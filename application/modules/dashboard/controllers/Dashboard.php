<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('dashboard_model', 'dashboard');
    }
    
    public function index()
    {
        $userData = $this->session->userdata();
        $data['content']  = 'dashboard/dashboard';
        $data['active']   = 'dashboard';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Dashboard';
        $data['breadcrumb'] = 'Dashboard';
        $data['userData']    = $userData;
        $data['countAlumni'] = $this->dashboard->countAlumni();
        $data['countGambar'] = $this->dashboard->countGambar();
        $data['countBerita'] = $this->dashboard->countBerita();
        $this->load->view("layouts/wrapper", $data);
    }

    private function isAdmin()
    {
        if($this->session->isLoggin && $this->session->roleName == 'Admin') {
            return true;
        }

        redirect('sign-out','refresh');
    }

}

/* End of file Dashboard.php */
