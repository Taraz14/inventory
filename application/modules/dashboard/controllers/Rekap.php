<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('dashboard_model', 'dashboard');
    }

    public function index()
    {
        $userData = $this->session->userdata();
        $this->load->view('layouts/wrapper', [
            'content' => 'dashboard/rekap_alumni',
            'active' => 'Rekap',
            'title' => 'ALUMNI SD 1 - Admin',
            'head' => 'Rekap Data',
            'breadcrumb' => 'Rekap Data',
            'userData' => $userData
        ]);
        
    }

    private function isAdmin()
    {
        if($this->session->isLoggin && $this->session->roleName == 'Admin') {
            return true;
        }

        redirect('sign-out','refresh');
    }

}

/* End of file Rekap.php */
