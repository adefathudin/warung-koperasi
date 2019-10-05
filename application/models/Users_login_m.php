<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_login_m extends MY_Model {

    protected $_table_name = 'users_login';
    protected $_primary_key = 'user_id';
    protected $_primary_filter = 'strval';
    protected $_order_by = '';
    protected $_timestamps = FALSE;
    protected $_timestamps_field = [];

    /*
    public function get($email){
        $this->db->where('email', $email); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('users_login')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }*/
}