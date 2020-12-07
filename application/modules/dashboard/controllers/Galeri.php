<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('dashboard_model', 'dashboard');
        $this->load->model('galeri_model', 'galeri');
        
    }

    public function index()
    {
        $userData = $this->session->userdata();
        $this->load->view('layouts/wrapper', [
            'content' => 'dashboard/galeri',
            'active' => 'Galeri',
            'title' => 'ALUMNI SD 1 - Admin',
            'head' => 'Galeri',
            'breadcrumb' => 'Galeri',
            'gambar' => $this->galeri->getImage(),
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

    public function upload(){
        $userData = $this->session->userdata();
        if(!empty($_FILES)){
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileType = $_FILES['file']['type'];
            $fileSize = $_FILES['file']['size'];
            $targetPath = './assets/img/galeri/';
            $targetFile = $targetPath.$fileName;

            move_uploaded_file($tempFile, $targetFile);

            $data = [
                'userId' => $userData['id'],
                'categoryId' => 1,
                'foto' => $fileName,
                'uploadAt' => time()
            ];

            $this->galeri->upload($data);
        }
    }

}

/* End of file Galeri.php */
