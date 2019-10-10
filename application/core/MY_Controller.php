<?php

class MY_Controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('users_detail_m');
        $this->load->library('session');
        $email = $this->session->userdata('email');
        //$data_user = $this->users_detail_m->get_detail_user($email);
        $this->data['data_user'] = $this->users_detail_m->get_detail_user($email); 
        
        if(!$this->session){
            $this->load->library('session');
        }
        if($this->session->userdata('akses' != FALSE)){
            redirect('auth');
        } 
    }
    
    protected function get_breadcumbs(){
        $url_array = explode('/', uri_string());
        
        return $url_array;
    }
}
