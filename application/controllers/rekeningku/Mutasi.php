<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Mutasi extends CI_Controller {
    public function index()
    {
        $this->data['title'] = 'Posisi Mutasi Saldo';
        $this->data['subview'] = 'rekeningku/mutasi';
        $this->load->view('_layout_main', $this->data);
    }

}
