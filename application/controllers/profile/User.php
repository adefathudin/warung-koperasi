<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class User extends MY_Controller {
    
    public function index($user_id = null )
    {
        $user_id = $this->session->userdata('user_id');
        $this->data = array (
            'title' => 'Ade Fathudin',
            'subview' => 'profile/profile'
        );
        $this->load->view('_layout_main', $this->data,$user_id);
    }


    public function id($user_id = null )
    { 
        $this->data['title'] = '';
        $this->data['subview'] = 'profile/profile';
        $this->load->view('_layout_main', $this->data);
    }
}

