<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Dashboard extends MY_Controller {
    public function index()
    {
        $this->load->model('rekening_m');
        $this->load->model('grup_m');
        $user_id = $this->session->userdata('user_id');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['list_grup_limit_3'] = $this->grup_m->get_list_grup_limit_3();
        $this->data['title'] = 'Warung Koperasi Solusi Masyarakat Sejahtera';
        $this->data['subview'] = 'dashboard/index';
        $this->load->view('_layout_main', $this->data);
    }
    public function saldo(){
        $this->load->model('rekening_m');
        $user_id = $this->input->get('user_id');
        $data = $this->rekening_m->get_saldo($user_id);
        echo json_encode($data);
    }

    public function notifikasi(){
        $this->load->model('notifikasi_m');
        $user_id = $this->input->get('user_id');
        $data = $this->notifikasi_m->cek_notifikasi($user_id);
        echo json_encode($data);
    }

    public function notifikasi_by_id(){
        $this->load->model('notifikasi_m');
        $id = $this->input->get('id');
        $data = $this->notifikasi_m->cek_notifikasi_by_id($id);
        echo json_encode($data);
    }

    public function update_baca_notifikasi(){
        $this->load->model('notifikasi_m');
        $id = $this->input->get('id');
        $this->notifikasi_m->save(array('baca'=> 1), $id);
    }

}
