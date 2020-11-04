<?php defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists("direct")) {
    
    function direct($path, $msg)
    {
        $ci =& get_instance();
        $ci->session->set_flashdata('message',$msg);
        redirect($path,'refresh');
    }
}

if(!function_exists("jsonOutput")) {
    
    function jsonOutput($callback)
    {
        $ci =& get_instance();
        $ci->output->set_content_type('application/json')->set_output(json_encode($callback));
    }
}

if(!function_exists('currentURL'))
{
    function currentURL()
    {
        $CI =& get_instance();

        $url = $CI->config->site_url($CI->uri->uri_string());
        return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
    }
}