<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('dashboard_model', 'dashboard');
        $this->load->model('berita_model', 'berita');
    }

    public function index()
    {
        $userData = $this->session->userdata();
        $userId = $userData['id'];
        $this->load->view('layouts/wrapper', [
            'content' => 'dashboard/berita',
            'active' => 'Berita',
            'title' => 'ALUMNI SD 1 - Admin',
            'head' => 'Berita',
            'breadcrumb' => 'Berita',
            'berita' => $this->berita->get($userId),
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

    public function create(){
        $userData = $this->session->userdata();
        $userId = $userData['id'];
        // echo $userId;die();
        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('koran'));
        if(!$this->form_validation->run()){
            // echo validation_errors();
            return $this->inputBerita();
        }
        $this->actionCreate($userId);
    }

    public function inputBerita(){
        $userData = $this->session->userdata();
        $data['content']  = 'dashboard/input_berita';
        $data['active']   = 'berita';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Input Berita';
        $data['breadcrumb'] = '<a href="'.site_url("0/berita").'">Berita</a> <li class="breadcrumb-item active"> Input Berita</li>';
        $data['userData']  = $userData;
        $this->load->view("layouts/wrapper", $data);
    }

    private function actionCreate($userId){
        $data = [
            "userId"        => $userId,
            "judul"      => $this->input->post('judul'),
            "slug"      => $this->input->post('slug'),
            "isiBerita"  => $this->input->post('berita'),
            "createdAt"  => time(),
        ];
        // echo validation_errors();
        // var_dump($data);die();
        if ( !$this->berita->set($data)) {
            return direct("0/input-berita", "Gagal upload berita.");
        }

        return direct("0/berita", "Berhasil Upload Berita");
    }

    public function deleteBerita($id){
        if(empty($id)){
            return jsonOutput(["result" => "error", "message" => "Data tidak ditemukan"]);
        }

        $params = [
            "beritaId" => $id
        ];

        if(!$this->berita->delete($params)){
            return jsonOutput(["result" => "error", "message" => "Gagal hapus berita"]);
        }

        $this->session->set_flashdata("message", "Berhasil hapus berita");
        return jsonOutput(["result" => "success", "message" => "Berhasil hapus berita"]);

    }

}

/* End of file Berita.php */
