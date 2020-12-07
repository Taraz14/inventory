<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAlumni();
        $this->load->model('settings_model', 'pengaturan');
        $this->load->helper('string');
        
    }

    public function index()
    {
        $userData = $this->session->userdata();
        $this->load->view('layouts/wrapper', [
            'content' => 'alumni/settings',
            'active' => 'Pengaturan', 
            'title' => 'ALUMNI SD 1 - Alumni',
            'head' => 'Pengaturan',
            'breadcrumb' => 'Pengaturan',
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
        $data['content']  = 'alumni/ubah_password';
        $data['active']   = 'Password';
        $data['title']    = 'ALUMNI SD 1 - Alumni';
        $data['head']       = 'Password';
        $data['breadcrumb'] = '<a href="'.site_url("1/pengaturan").'">Pengaturan</a> <li class="breadcrumb-item active"> Password</li>';
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
            return direct("1/pengaturan/password", "Gagal reset password");
        }

        return direct("1/pengaturan/password", "Berhasil reset password");
    }

}

/* End of file Settings.php */
