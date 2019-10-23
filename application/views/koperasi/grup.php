<?php
$this->load->view('koperasi/layout/_layout_grup_head');
if ($page = $this->uri->segment(3)){
  $this->load->view('koperasi/layout/_layout_grup_content_'.$page);} else {
    redirect ('dashboard');
}
$this->load->view('koperasi/layout/_layout_grup_foot');
?>