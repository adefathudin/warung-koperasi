<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Cashout extends MY_Controller {
    public function index()
    {
        $this->load->model('rekening_m');
        $user_id = $this->session->userdata('user_id');
        $this->data['curdate'] = date('d-m-Y h:i:sa');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['title'] = 'Tarik Saldo Rekening';
        $this->data['subview'] = 'rekening/cashout';
        $this->load->view('_layout_main', $this->data);
    }

}
