<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Cashout extends MY_Controller {
    public function index()
    {
        $this->data['title'] = 'Tarik Saldo Rekening';
        $this->data['subview'] = 'rekeningku/cashout';
        $this->load->view('_layout_main', $this->data);
    }

}
