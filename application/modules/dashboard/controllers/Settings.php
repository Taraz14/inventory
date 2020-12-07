<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('pengaturan_model', 'pengaturan');
        $this->load->helper('string');
        
    }

    public function index()
    {
        $userData = $this->session->userdata();
        $this->load->view('layouts/wrapper', [
            'content' => 'dashboard/settings',
            'active' => 'Pengaturan', 
            'title' => 'ALUMNI SD 1 - Admin',
            'head' => 'Pengaturan',
            'breadcrumb' => 'Pengaturan',
            'userData' => $userData
        ]);
        
    }

    public function email(){
        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('email'));
        if ( ! $valid->run()) {
            echo validation_errors();die();
            return $this->PageEmail();
        }

        $this->emailAction();
    }

    private function PageEmail()
    {
        $userData = $this->session->userdata();
        $this->load->view('layouts/wrapper', [
            'content' => 'dashboard/set_email',
            'active' => 'Pengaturan Email',
            'title' => 'ALUMNI SD 1 - Admin',
            'head' => 'Pengaturan',
            'breadcrumb' => '<a href="'.site_url("0/pengaturan").'">Pengaturan</a> <li class="breadcrumb-item active"> Email</li>',
            'userData' => $userData
        ]);
        
    }

    private function emailAction()
    {
        $data = [
            "configvalue" => $this->input->post('email_sekolah')
        ];
        $params = [
            "configname" => 'email_sekolah'
        ];

        if(!$this->pengaturan->emailUpdate($data, $params)) {
            return direct("0/pengaturan/email", "Gagal ubah email");
        }

        return direct("0/pengaturan/email", "Berhasil ubah email");
    }

    private function isAdmin()
    {
        if($this->session->isLoggin && $this->session->roleName == 'Admin') {
            return true;
        }

        redirect('sign-out','refresh');
    }

    public function resetPassword()
    {
        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('reset_password'));
        if ( ! $valid->run()) {
            return $this->pageResetPassword();
        }

        $this->resetPasswordAction();
    }

    private function pageResetPassword()
    {
        $userData = $this->session->userdata();
        $data['content']  = 'dashboard/ubah_password';
        $data['active']   = 'Password';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Password';
        $data['breadcrumb'] = '<a href="'.site_url("0/pengaturan").'">Pengaturan</a> <li class="breadcrumb-item active"> Password</li>';
        $data['userData'] = $userData;
        $this->load->view("layouts/wrapper", $data);
    }

    private function resetPasswordAction()
    {
        $data = [
            "userPassword" => password_hash($this->input->post('userPassword'), PASSWORD_DEFAULT)
        ];
        $params = [
            "userId" => $this->session->id
        ];

        if(!$this->pengaturan->update($data, $params)) {
            return direct("0/pengaturan/password", "Gagal reset password");
        }

        return direct("0/pengaturan/password", "Berhasil reset password");
    }

}

/* End of file Pengaturan.php */
