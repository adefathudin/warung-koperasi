<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Create_group extends MY_Controller {
    public function index()
    {
        $this->data['title'] = 'Buat Group Koperasi';
        $this->data['subview'] = 'koperasi/create_group';
        $this->load->view('_layout_main', $this->data);
    }

}
