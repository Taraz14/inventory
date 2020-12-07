<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('dashboard_model', 'dashboard');
        $this->load->model('profile_model', 'profile');
        $this->load->helper('string');
    }

    private function isLoggin()
    {
        if (!$this->session->isLoggin) {
            redirect('sign-out?r_dr=' . currentURL(), 'refresh');
        }
    }

    public function index()
    {
        $userData = $this->session->userdata();
        $data['content']  = 'dashboard/profile';
        $data['active']   = 'profile';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Profile';
        $data['breadcrumb'] = 'Profile';
        $data['userData'] = $userData;
        $this->load->view("layouts/wrapper", $data);
    }

    private function isAdmin()
    {
        if ($this->session->isLoggin && $this->session->roleName == 'Admin') {
            return true;
        }

        redirect('sign-out', 'refresh');
    }

    public function update()
    {
        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('update_profile'));
        if (!$valid->run()) {
            return $this->pageUpdate();
        }

        $this->actionUpdate();
    }

    private function pageUpdate()
    {
        $userData = $this->session->userdata();
        $data['content']  = 'dashboard/update_profile';
        $data['active']   = 'profile';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Ubah Profile';
        $data['breadcrumb'] = '<a href="' . site_url("0/profile") . '">Profile</a> <li class="breadcrumb-item active"> Ubah Data</li>';
        $data['userData'] = $userData;
        $this->load->view("layouts/wrapper", $data);
    }

    private function uploadImage()
    {
        $path = 'assets/img/admin/';
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $name         = "profile_" . random_string('alnum', 8) . "_" . microtime(true) . "_" . date("Ymd") . ".jpg";
        $config['upload_path']   = FCPATH . $path;
        $config['allowed_types'] = "gif|jpg|png|jpeg";
        $config['file_name']     = $name;
        $config['overwrite']     = true;
        $config['max_size']      = 1024;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('userImage')) {
            return direct("profile", $this->upload->display_errors());
        } else {
            $url = $path . $this->upload->data("file_name");
            return $url;
        }
    }

    private function actionUpdate()
    {
        $data = [
            "userName"     => $this->input->post('userName'),
            "userUsername" => $this->input->post('userUsername'),
            "userEmail"    => $this->input->post('userEmail'),
            "userAddress"  => $this->input->post('userAddress')
        ];

        $params = ["userId" => $this->session->userdata('id')];
        $images = null;
        if (!empty($_FILES['userImage']['name'])) {
            $profile = $this->profile->findImages($params);
            $images  = FCPATH . $profile->userImage;
            if (@getimagesize($images)) {
                unlink($images);
            }

            $data["userImage"] = $this->uploadImage();
        }

        if (!$this->profile->update($data, $params)) {
            return direct("0/update-profile", "Gagal update profil");
        }

        $this->session->unset_userdata('name');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('address');
        if (!empty($_FILES['userImage']['name'])) {
            $this->session->unset_userdata('photo');
            $images = true;
        }

        $this->updateSessi($data, $images);

        return direct("0/profile", "Berhasil update profil");
    }

    private function updateSessi($data, $image)
    {
        $sessi = array(
            'name'     => $data['userName'],
            'username' => $data['userUsername'],
            'email'    => $data['userEmail'],
            'address'  => $data['userAddress'],
        );

        if (!is_null($image) && $image) {
            $sessi['photo'] = $data['userImage'];
        }

        $this->session->set_userdata($sessi);
    }
}

/* End of file Profile.php */
