<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Topup extends MY_Controller {
    public function index()
    {
        $this->data['title'] = 'Top-Up Saldo';
        $this->data['subview'] = 'rekeningku/topup';
        $this->load->view('_layout_main', $this->data);
    }

}
