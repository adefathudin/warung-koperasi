<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends MY_Controller {
    public function index()
    {
        $this->load->model('rekening_m');
        $user_id = $this->session->userdata('user_id');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['list_grup_limit_3'] = $this->grup_m->get_list_grup_limit_3();
        $this->data['title'] = 'Warung Koperasi Solusi Masyarakat Sejahtera';
        $this->data['subview'] = 'dashboard/index';
        $this->load->view('_layout_main', $this->data);
    }

}
