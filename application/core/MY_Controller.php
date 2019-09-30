<?php

class MY_Controller extends CI_Controller {
    protected $userlib;
    protected $data;
    
    function __construct() {
        parent::__construct();
        
        $this->load->library('session');
        
        $this->userlib = new Userlib();
        $this->data['breadcumbs'] = $this->get_breadcumbs();
        $this->data['menus'] = $this->userlib->get_menus(uri_string());
        $this->data['me'] = $this->userlib->get_login_detail();

        // check if has login
        if(!$this->session){
            $this->load->library('session');
        }
        
        if(!$this->userlib->has_login()){
            redirect(base_url('auth/index/'.set_url_back(uri_string())));
        }
    }
    
    protected function get_breadcumbs(){
        $url_array = explode('/', uri_string());
        
        return $url_array;
    }
}
