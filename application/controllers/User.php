<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cek Login
        if ($this->session->userdata('status') != 'login') {
            redirect('auth');
        }
        $this->load->model('User_model');
        $this->load->helper('url');
    }

    public function index() {
        $data['users'] = $this->User_model->get_all_user();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('user/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        if ($this->input->post()) {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username'     => $this->input->post('username'),
                'password'     => md5($this->input->post('password')) // Enkripsi MD5
            ];
            $this->User_model->insert_user($data);
            redirect('user');
        }

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('user/tambah');
        $this->load->view('layout/footer');
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'username'     => $this->input->post('username')
            ];

            // Jika password diisi, maka update password. Jika kosong, biarkan password lama.
            $pass_baru = $this->input->post('password');
            if (!empty($pass_baru)) {
                $data['password'] = md5($pass_baru);
            }

            $this->User_model->update_user($id, $data);
            redirect('user');
        }

        $data['user'] = $this->User_model->get_user_by_id($id);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('user/edit', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id) {
        // Mencegah user menghapus akun yang sedang login sendiri
        if($id == $this->session->userdata('id_admin')) {
            echo "<script>alert('Tidak dapat menghapus akun yang sedang aktif!'); window.location.href='".base_url('user')."';</script>";
        } else {
            $this->User_model->delete_user($id);
            redirect('user');
        }
    }
}