<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAlumni();
        // $this->load->model('dashboard_model', 'dashboard');
        $this->load->model('alumni/berita_model', 'berita');
    }

    public function index()
    {
        $userData = $this->session->userdata();
        $userId = $userData['id'];
        $this->load->view('layouts/wrapper', [
            'content' => 'berita',
            'active' => 'Berita',
            'title' => 'ALUMNI SD 1 - Admin',
            'head' => 'Berita',
            'breadcrumb' => 'Berita',
            'news' => $this->berita->get(),
            'userData' => $userData
        ]);
        
    }

    private function isAlumni()
    {
        if($this->session->isLoggin && $this->session->roleName == 'Alumni') {
            return true;
        }

        redirect('sign-out','refresh');
    }

    public function beritaDetail($id){
        $userData = $this->session->userdata();
        $userId = $userData['id'];
        $this->load->view('layouts/wrapper', [
            'content' => 'berita_detail',
            'active' => 'Berita Detail',
            'title' => 'ALUMNI SD 1 - Alumni',
            'head' => 'Berita',
            'breadcrumb' => '<a href="'.site_url("1/berita").'">Berita</a> <li class="breadcrumb-item active"> Berita Selengkapnya</li>',
            'news' => $this->berita->lengkap($id),
            'userData' => $userData
        ]);
        
    }

}

/* End of file Berita.php */
