<?php

class Users_detail_m extends MY_Model {

    protected $_table_name = 'users_detail';
    protected $_primary_key = 'user_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_detail_user($email){
        $this->db->where('email', $email);
        $result = $this->db->get('users_detail')->row();
        return $result;
    }
}
