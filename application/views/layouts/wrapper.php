<?php 
    $this->load->view('layouts/_headScript');
    $this->load->view('layouts/_navbar');
    if($this->session->roleName == 'Admin'){
        $this->load->view('layouts/_admin_sidebar');
    }
    $this->load->view('layouts/_headContent');
    $this->load->view($content);
    $this->load->view('layouts/_footer');
    $this->load->view('layouts/_endScript');
    
    
    
    
?>