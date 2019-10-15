<?php

class User_grup_m extends MY_Model {

    protected $_table_name = 'user_grup';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    
    public function get_user_grup($user_id){
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('user_grup')->row();
        return $result;
    }

    public function get_user($user_id){
        $this->db->where('user_id', $user_id);
        $result = $this->db->get('users_detail')->row();
        return $result;
    }
}