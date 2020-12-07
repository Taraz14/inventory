<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAlumni();
        $this->load->model('alumni/galeri_model', 'galeri');
    }

    public function index()
    {
        $data['content']  = 'galeri';
        $data['active']   = 'galeri';
        $data['title']    = 'ALUMNI SD 1 - Alumni';
        $data['head']       = 'Galeri';
        $data['breadcrumb'] = 'Galeri';
        $data['gambar'] = $this->galeri->getImage();
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

/* End of file Galeri.php */
