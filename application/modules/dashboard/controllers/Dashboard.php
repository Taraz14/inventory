<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model', 'dashboard');
    }
    
    public function index()
    {
        $this->isAdmin();
        // $analityc         = $this->dashboard->countStatusTransaction();
        $data['content']  = 'dashboard/admin/dashboard';
        $data['active']   = 'dashboard';
        $data['title']    = 'ALUMNI SD 1 - Admin';
        $data['breadcrumb'] = 'Dashboard';
        // $data['product']  = $this->dashboard->countProduct();
        // $data['customer'] = $this->dashboard->countCustomer();
        // $data['analityc'] = $analityc;
        $this->load->view("layouts/wrapper", $data);
    }

    private function isAdmin()
    {
        if($this->session->isLoggin && $this->session->roleName == 'Admin') {
            return true;
        }

        redirect('sign-out','refresh');
    }

}

/* End of file Dashboard.php */
