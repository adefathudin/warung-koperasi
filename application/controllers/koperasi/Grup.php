<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Grup extends MY_Controller {
    public function index()
    {
        $this->data['title'] = 'Koperasi Saloome';
        $this->data['subview'] = 'koperasi/group';
        $this->load->view('_layout_main', $this->data);
    }

    public function id($grup_id = null )
    { 
        $this->load->model('grup_m');
        $user_id =  $this->uri->segment(3);
        $this->data['data_grup_tmp'] = $this->grup_m->get_detail_grup($grup_id); 
        $this->data['title'] = 'tese';
        $this->data['subview'] = 'koperasi/grup';
        $this->load->view('_layout_main', $this->data);
    }

}
