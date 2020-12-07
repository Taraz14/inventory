<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekap extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('rekap_model', 'rekap');
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
            'userData'    => $userData,
            'years'     => $this->rekap->getYears(),    
        ]);
        
    }

    private function isAdmin()
    {
        if($this->session->isLoggin && $this->session->roleName == 'Admin') {
            return true;
        }

        redirect('sign-out','refresh');
    }

    public function detailRekap($id){
        $userData = $this->session->userdata();
        $this->load->view('layouts/wrapper', [
            'content' => 'dashboard/detail_rekap',
            'active' => 'Rekap',
            'title' => 'ALUMNI SD 1 - Admin',
            'head' => 'Deail Rekap Alumni',
            'breadcrumb' => '<a href="'.site_url("0/rekap").'">Rekap Data</a> <li class="breadcrumb-item active"> Detail Rekap Alumni</li>',
            'userData'    => $userData,
            'alumni'     => $this->rekap->get($id),    
        ]);
    }

}

/* End of file Rekap.php */
