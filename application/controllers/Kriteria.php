<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // --- TAMBAHKAN KODE INI ---
        if ($this->session->userdata('status') != 'login') {
            redirect('auth');
        }
        $this->load->model('Spk_model');
        $this->load->helper('url');
    }

    public function index() {
        $data['kriteria'] = $this->Spk_model->get_kriteria();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('kriteria/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        if ($this->input->post()) {
            $data = [
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'bobot'         => $this->input->post('bobot')
            ];
            $this->Spk_model->insert_kriteria($data);
            redirect('kriteria');
        }

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('kriteria/tambah');
        $this->load->view('layout/footer');
    }

    public function edit($id) {
        if ($this->input->post()) {
            $data = [
                'kode_kriteria' => $this->input->post('kode_kriteria'),
                'nama_kriteria' => $this->input->post('nama_kriteria'),
                'bobot'         => $this->input->post('bobot')
            ];
            $this->Spk_model->update_kriteria($id, $data);
            redirect('kriteria');
        }

        $data['kriteria'] = $this->Spk_model->get_kriteria_by_id($id);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('kriteria/edit', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id) {
        $this->Spk_model->delete_kriteria($id);
        redirect('kriteria');
    }
}