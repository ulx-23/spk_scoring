<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_all_user() {
        return $this->db->get('admin')->result();
    }

    public function get_user_by_id($id) {
        return $this->db->get_where('admin', ['id_admin' => $id])->row();
    }

    public function insert_user($data) {
        return $this->db->insert('admin', $data);
    }

    public function update_user($id, $data) {
        $this->db->where('id_admin', $id);
        return $this->db->update('admin', $data);
    }

    public function delete_user($id) {
        $this->db->where('id_admin', $id);
        return $this->db->delete('admin');
    }
}