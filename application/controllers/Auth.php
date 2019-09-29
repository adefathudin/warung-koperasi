<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Auth extends CI_Controller {
    public function index()
    {
        $this->load->view('login');
    }
    
    public function login(){
        $this->load->view('login');
    }

    public function reg(){
        $this->load->view('registrasi');
    }
    
    public function logout(){
        $this->load->library('session');
        if ($this->session) {
            $this->session->sess_destroy();
        }

        redirect(base_url('auth'));
    }
}
