<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('dashboard_model', 'dashboard');
    }
    
    public function index()
    {
        $userData = $this->session->userdata();
        $data['content']  = 'dashboard/admin/profile';
        $data['active']   = 'profile';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Profile';
        $data['breadcrumb'] = 'Profile';
        $data['userData'] = $userData;
        $this->load->view("layouts/wrapper", $data);
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
        $data['content']  = 'dashboard/admin/update_profile';
        $data['active']   = 'profile';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Ubah Profile';
        $data['breadcrumb'] = 'Ubah Profile';
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

        if(!$this->profile->update($data, $params)) {
            return direct("profile/reset-password", "Gagal reset password");
        }

        return direct("profile/reset-password", "Berhasil reset password");
    }
}

/* End of file Profile.php */
