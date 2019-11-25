<?php

class Topup_m extends MY_Model {

    protected $_table_name = 'topup';
    protected $_primary_key = 'topup_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_last($order_id){
        $this->db->where('topup_id', $order_id);
        $result = $this->db->get('topup')->row();
        return $result;
    }

}
