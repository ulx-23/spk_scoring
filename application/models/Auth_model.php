<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function cek_login($username, $password) {
        // Cek username dan password (md5)
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));
        return $this->db->get('admin')->row();
    }
}