<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users_m extends CI_Model {
    
    public function get($email){
        $this->db->where('email', $email); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('users')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }
}