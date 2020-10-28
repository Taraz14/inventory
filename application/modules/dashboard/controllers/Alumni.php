<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('dashboard_model', 'dashboard');
        $this->load->helper('string');
    }
    
    public function index(){
        $data['content']  = 'dashboard/admin/input_alumni';
        $data['active']   = 'alumni';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['breadcrumb'] = 'Input Alumni';
        $data['gender']     = $this->dashboard->getGender();
        $this->load->view("layouts/wrapper", $data);
    }

    public function create(){
        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('register'));
        if(!$valid->run()){
            return $this->index();
        }

        $this->actionCreate();
    }

    private function actionCreate(){
        $userName = $this->input->post('userName').' '.$this->input->post('userLastName');
        $data = [
            "genderId"      => $this->input->post('userGender'),
            "userNisn"      => $this->input->post('userNisn'),
            "userName"      => $userName,
            "userUsername"  => $this->input->post('userNisn'),
            "userPassword"  => password_hash($this->input->post('userNisn'), PASSWORD_DEFAULT),
            "userPhone"     => $this->input->post('userPhone'),
            "userAdress"    => $this->input->post('userAlamat'),
            "userBirthPlace"=> $this->input->post('userBP'),
            "userBirthDate" => $this->input->post('userDateB'),
            "userImage"     => NULL,
            "createdAt"     => time(),
            "updateAt"      => time(),
        ];

        if(!$this->dashboard->set($data)){
            return direct("0/alumni", "Gagal Menambahkan");
        }

        return direct("0/alumni", "Berhasil Ditambahkan");
    }

    private function isAdmin()
    {
        if($this->session->isLoggin && $this->session->roleName == 'Admin') {
            return true;
        }

        redirect('sign-out','refresh');
    }


}

/* End of file Alumni.php */
