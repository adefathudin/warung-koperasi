<?php

class MY_Controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('users_detail_m');
        $this->load->model('user_grup_m');
        $this->load->model('grup_m');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
        $user_id = $this->session->userdata('user_id');
        $this->data['user_grup'] = $this->user_grup_m->get_user_grup($user_id);
        $this->data['data_user'] = $this->users_detail_m->get_user($user_id); 
        $this->data['list_grup'] = $this->grup_m->get_list_grup();
        
        if(!$this->session){
            $this->load->library('session');
        }
        if(!$this->session->userdata('akses')){
            $this->session->set_flashdata('message','Anda harus login terlebih dahulu');
            redirect('auth');
        } 
    }
    
    protected function get_breadcumbs(){
        $url_array = explode('/', uri_string());
        
        return $url_array;
    }
}
