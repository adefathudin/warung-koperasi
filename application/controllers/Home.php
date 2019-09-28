<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Home extends CI_Controller {
    public function index()
    {
        $this->data['title'] = 'Data Log Aplikasi';
        $this->data['subview'] = 'index';
        $this->load->view('_layout_main', $this->data);
    }

}
