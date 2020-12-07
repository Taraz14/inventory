<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    const ALUMNI_ROLE = 2;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'auth');
    }

    public function index()
    {
        $this->signIn();
    }

    public function signIn(){
        $redirect = $this->input->get('r_dr');
        $this->isLoggedin($redirect);

        $valid = $this->form_validation;
        $rules = $this->config;

        $valid->set_rules($rules->item('sign_in'));
        if ( ! $valid->run()) {
            return $this->pageSignIn($redirect);
        } 

        return $this->checkAccount($redirect);
    }

    private function isLoggedin($r_dr = "")
    {
        if($this->session->isLoggin) {
            switch (strtolower($this->session->roleName)) {
                case 'Admin':
                    if(!empty($r_dr)) {
                        redirect($r_dr,'refresh');
                    }
                    redirect('0/dashboard','refresh');
                    break;
                 case 'Alumni':
                    if(!empty($r_dr)) {
                        redirect($r_dr,'refresh');
                    }
                    redirect('1/dashboard','refresh');
                    break;
                default:
                    redirect('sign-out','refresh');
                    break;
            }
        }
    }

    private function pageSignIn($redirect = "")
    {
        $data['r_dr'] = $redirect;
        $this->load->view("auth/sign_in", $data);
    }

    private function checkAccount($r_dr = "")
    {
        $params  = [
            "u.userUsername" => $this->input->post('username')
        ];

        $account = $this->auth->find($params);
        if($account->num_rows() !== 1) {
            // echo $this->input->post('username');
            return direct((!empty($r_dr)) ? 'auth?r_dr='.rawurlencode($r_dr) : '', "Maaf password atau username salah.");
        }

        $account = $account->row();
        if(!password_verify($this->input->post('password'), $account->userPassword)) {
            return direct((!empty($r_dr)) ? 'auth?r_dr='.rawurlencode($r_dr) : '', "Maaf password atau username salah.");
        }

        if(!$this->setSessiAccount($account)) {
            return direct((!empty($r_dr)) ? 'auth?r_dr='.rawurlencode($r_dr) : '', "Maaf password atau username salah.");
        }

        if(!empty($r_dr)) {
            $parsing = parse_url($r_dr);
            $r_dr    = str_replace("/inventory", "", $parsing['path']);
        }

        switch (strtolower($account->roleName)) {
            case 'admin':
                if(!empty($r_dr)) {
                    redirect($r_dr,'refresh');
                }
                redirect('0/dashboard','refresh');
                break;
             case 'alumni':
                if(!empty($r_dr)) {
                    redirect($r_dr,'refresh');
                }
                redirect('1/dashboard','refresh');
                break;
            default:
                redirect('sign-out','refresh');
                break;
        }
    }

    private function setSessiAccount($account)
    {
        if(!empty($account)) {
            $sessi = [
                "id"       => $account->userId,
                "gender"   => $account->genderId,
                "username" => $account->userUsername,
                "email"    => $account->userEmail,
                "photo"    => $account->userImage,
                "name"     => $account->userName,
                "address"  => $account->userAddress,
                "roleId"   => $account->roleId,
                "roleName" => $account->roleName,
                "years"    => $account->userYears,
                "isLoggin" => true
            ];
            // var_dump($sessi);die();
            $this->session->set_userdata($sessi);
            return true;
        }
        return false;
    }

    public function signOut()
    {
        $sessi = $this->session->all_userdata();
        foreach ($sessi as $key => $value) {
            if($key !== "__ci_last_regenerate") {
                $this->session->unset_userdata($key);
            }
        }

        $redirect   = $this->input->get('r_dr');
        if(!empty($redirect)) {
            redirect('auth?r_dr='.rawurlencode($redirect),'refresh');
        }
        
        redirect('', 'refresh');
    }

}

/* End of file Authentication.php */
