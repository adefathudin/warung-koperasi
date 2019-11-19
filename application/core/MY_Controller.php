<?php

class MY_Controller extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        
        $this->load->model('users_detail_m');
        $this->load->model('grup_user_m');
        $this->load->library('session');
        date_default_timezone_set("Asia/Jakarta");
        $user_id = $this->session->userdata('user_id');
        //AMBIL DATA USER
        $this->data['data_user'] = $this->users_detail_m->get_user($user_id); 

        //TAMPILKAN GRUP BESERTA DATANYA
        $this->data['list_grup'] = $this->grup_user_m->get_list_grup($user_id);

        $this->data['user_id'] = $user_id;
                
        if(!$this->session){
            $this->load->library('session');
        }
        if(empty($this->session->userdata('user_id'))){
            $this->session->set_flashdata('message','Anda harus login terlebih dahulu');
            redirect('auth');
        } 
    }
    
    protected function get_breadcumbs(){
        $url_array = explode('/', uri_string());
        
        return $url_array;
    }
}
 