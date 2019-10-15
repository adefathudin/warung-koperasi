<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Mutasi extends MY_Controller {
    public function index()
    {
        $this->load->model('rekening_m');
        $this->load->model('mutasi_rekening_m');
        $user_id = $this->session->userdata('user_id');
        $this->data['curdate'] = date('d-m-Y h:i:sa');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['laporan_mutasi'] = $this->mutasi_rekening_m->get_mutasi_rekening($user_id);
        $this->data['title'] = 'Posisi Mutasi Saldo';
        $this->data['subview'] = 'rekening/mutasi';
        $this->load->view('_layout_main', $this->data);
    }

}
