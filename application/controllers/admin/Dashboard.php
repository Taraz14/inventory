<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function index()
    {
        $this->load->view('layouts/index', [
            'content' => 'pages/admin/dashboard'
        ], FALSE);
        
    }

}

/* End of file Dashboard.php */
