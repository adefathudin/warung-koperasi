<?php
if($this->session->userdata('nama_lengkap' == null)){
    redirect('auth');
} else {
$this->load->view('layout/_layout_header');
$this->load->view('layout/_layout_sidebar');
$this->load->view('layout/_layout_top_body');
$this->load->view($subview);
$this->load->view('layout/_layout_footer'); }