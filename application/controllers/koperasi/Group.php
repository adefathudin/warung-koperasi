<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Group extends CI_Controller {
    public function index()
    {
        $this->data['title'] = 'Saloome Koperasi';
        $this->data['subview'] = 'koperasi/group';
        $this->load->view('_layout_main', $this->data);
    }

}