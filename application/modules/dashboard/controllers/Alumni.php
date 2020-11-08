<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends CI_Controller {

    const ALUMNI = 2;
    
    public function __construct()
    {
        parent::__construct();
        $this->isAdmin();
        $this->load->model('dashboard_model', 'dashboard');
        $this->load->helper('string');
    }
    
    public function index(){
        $userData = $this->session->userdata();
        $data['content']  = 'dashboard/alumni';
        $data['active']   = 'alumni';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Alumni';
        $data['breadcrumb'] = 'Alumni';
        $data['userData']    = $userData;
        $data['alumni']     = $this->dashboard->get();
        $this->load->view("layouts/wrapper", $data);
    }

    public function create(){
        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('register'));
        if(!$this->form_validation->run()){
            // echo validation_errors();
            return $this->inputAlumni();
        }else{
            $this->actionCreate();
        }
    }

    public function inputAlumni(){
        $userData = $this->session->userdata();
        $data['content']  = 'dashboard/input_alumni';
        $data['active']   = 'alumni';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Input Alumni';
        $data['breadcrumb'] = '<a href="'.site_url("0/alumni").'">Alumni</a> <li class="breadcrumb-item active"> Input Alumni</li>';
        $data['userData']  = $userData;
        $data['gender']     = $this->dashboard->getGender();
        $this->load->view("layouts/wrapper", $data);
    }


    private function actionCreate(){
        $userDateB = explode('-', $this->input->post('userDateB'));
        $userDateB = $userDateB[2].'-'.$userDateB[1].'-'.$userDateB[0];
        // echo $userDateB;die();
        $data = [
            "genderId"      => $this->input->post('userGender'),
            "userNisn"      => $this->input->post('userNisn'),
            "userName"      => $this->input->post('userName'),
            "userLastName"  => $this->input->post('userLastName'),
            "userUsername"  => $this->input->post('userNisn'),
            "userPassword"  => password_hash($this->input->post('userNisn'), PASSWORD_DEFAULT),
            "userPhone"     => $this->input->post('userPhone'),
            "userEmail"     => $this->input->post('userEmail'),
            "userAddress"    => $this->input->post('userAlamat'),
            "userBirthPlace"=> $this->input->post('userBP'),
            "userBirthDate" => $userDateB,
            "userImage"     => 'nophoto.png',
            "userYears"     => $this->input->post('year'),
            "createdAt"     => time(),
            "updateAt"      => time(),
        ];
        // var_dump($data['userYears']);die();
        $userId = $this->dashboard->set($data);
        // echo $userId;die();
        if(!$userId){
            return direct("0/alumni", "Gagal Menambahkan");
        }

        $role = [
            "userId" => $this->db->insert_id(),
            "roleId" => Alumni::ALUMNI
        ];

        if ( !$this->dashboard->setRole($role)) {
            return direct("0/alumni", "Gagal mendaftar akun.");
        }

        return direct("0/alumni", "Berhasil Ditambahkan");
    }

    public function deleteAlumni($id){
        if(empty($id)){
            return jsonOutput(["result" => "error", "message" => "Data tidak ditemukan"]);
        }

        $params = [
            "userId" => $id
        ];

        if(!$this->dashboard->delete($params)){
            return jsonOutput(["result" => "error", "message" => "Gagal hapus alumni"]);
        }

        $this->session->set_flashdata("message", "Berhasil hapus alumni");
        return jsonOutput(["result" => "success", "message" => "Berhasil hapus alumni"]);

    }

    public function update($id){
        $user = $this->dashboard->findUser(["userId" => $id]);
        if($user->num_rows() !== 1 ){
            return direct("0/alumni", "Data tidak ditemukan");
        }

        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('update_alumni'));
        if(!$valid->run()){
            // echo validation_errors();
            return $this->pageUpdate($user->row());

        }

        return $this->actionUpdate();
    }

    private function pageUpdate($user){
        $userData = $this->session->userdata();
        
        $data['content']  = 'dashboard/update_alumni';
        $data['active']   = 'alumni';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['head']       = 'Edit Alumni';
        $data['breadcrumb'] = '<a href="'.site_url("0/alumni").'">Alumni</a> <li class="breadcrumb-item active"> Edit Alumni</li>';
        $data['user']       = $user;
        $data['userData']       = $userData;
        $data['gender']     = $this->dashboard->getGender();
        $this->load->view("layouts/wrapper", $data);
    }

    public function actionUpdate(){
        $userDateB = explode('-', $this->input->post('userDateB'));
        $userDateB = $userDateB[2].'-'.$userDateB[1].'-'.$userDateB[0];

        $params = [
            "userId" => $this->input->post('userId')
        ];

        $data = [
            "genderId"      => $this->input->post('userGender'),
            "userName"      => $this->input->post('userName'),
            "userLastName"      => $this->input->post('userLastName'),
            "userPhone"     => $this->input->post('userPhone'),
            "userEmail"     => $this->input->post('userEmail'),
            "userAddress"    => $this->input->post('userAlamat'),
            "userBirthPlace"=> $this->input->post('userBP'),
            "userBirthDate" => $userDateB,
            "userYears"     => $this->input->post('year'),
        ];
        // var_dump($data);die();
        if(!$this->dashboard->update($data, $params)){
            return direct("0/update-alumni/".$params['userId'], "Data gagal diubah");
        }

        return direct("0/alumni", "Data Berhasil diubah");
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
