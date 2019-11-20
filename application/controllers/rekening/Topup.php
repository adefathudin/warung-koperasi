<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Topup extends MY_Controller {
    public function index()
    {
        $this->load->model('rekening_m');
        $user_id = $this->session->userdata('user_id');
        $this->data['curdate'] = date('d-m-Y h:i:sa');
        $this->data['saldo'] = $this->rekening_m->get_saldo($user_id);
        $this->data['title'] = 'Top-Up Saldo';
        $this->data['subview'] = 'rekening/topup';
        $this->load->view('_layout_main', $this->data);
    }

    public function insert(){
        $this->load->model('notifikasi_m');
        $this->load->model('mutasi_rekening_m');

        $user_id = $this->input->post('user_id');
        $order_id = $this->input->post('order_id');
        $nominal = $this->input->post('nominal');
        $insert_mutasi_rekening = array (
            'user_id' => $user_id, 'order_id' => $order_id, 'jenis_trx' => 2, 'nominal' => $nominal, 'status' => 0
        );
        $this->mutasi_rekening_m->save($insert_mutasi_rekening);
    }

    public function update(){
        $this->load->model('notifikasi_m');
        $this->load->model('mutasi_rekening_m');
        $this->load->model('rekening_m');
        $user_id = $this->session->userdata('user_id');
        $order_id = $this->input->post('order_id');
        
        $last_topup =  $this->mutasi_rekening_m->get($order_id);
        $saldo = $this->rekening_m->get($user_id);

        $insert_mutasi_rekening = array (
           'status' => 1
        );

        $update_saldo_rekening = array (
            'saldo_awal' => $saldo->saldo_akhir, 'saldo_akhir' => $saldo->saldo_akhir + $last_topup->nominal,
            'total_nominal_cash_in' => $saldo->total_nominal_cash_in + $last_topup->nominal, 'total_cash_in' => $saldo->total_cash_in + 1
        );

        $insert_notifikasi = array (
            'user_id' => $user_id, 'judul' => 'Topup Saldo Berhasil', 'isi' => 'Topup saldo senilai Rp. '.$last_topup->nominal.' berhasil dilakukan. Silahkan hubungi kami jika mengalami kendala'
        );
        if ($this->mutasi_rekening_m->save($insert_mutasi_rekening,$order_id)){
            $this->rekening_m->save($update_saldo_rekening, $user_id);
            $this->notifikasi_m->save($insert_notifikasi);  

        };
    }


}
