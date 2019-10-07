<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Profile extends CI_Controller {
    public function index()
    {
        $this->data['title'] = 'Profilku';
        $this->data['subview'] = 'profile/profile';
        $this->load->view('_layout_main', $this->data);
    }

}
