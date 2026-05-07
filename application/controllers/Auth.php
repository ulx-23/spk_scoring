<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auth_model');
    }

    public function index() {
        // Jika sudah login, lempar ke dashboard
        if ($this->session->userdata('status') == 'login') {
            redirect('dashboard');
        }
        $this->load->view('auth/login');
    }

    public function proses() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $cek = $this->Auth_model->cek_login($username, $password);

        if ($cek) {
            // Jika Benar, buat Session
            $data_session = [
                'id_admin' => $cek->id_admin,
                'nama'     => $cek->nama_lengkap,
                'status'   => 'login'
            ];
            $this->session->set_userdata($data_session);
            redirect('dashboard');
        } else {
            // Jika Salah, tampilkan pesan error
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username atau Password salah!</div>');
            redirect('auth');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('auth');
    }
}