<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Spk_model');
        $this->load->helper('url');
        $this->load->library('form_validation'); // Untuk validasi input
    }

    public function index() {
        $data['alternatif'] = $this->Spk_model->get_alternatif();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('alternatif/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        // Logika simpan data
        if ($this->input->post()) {
            $data = [
                'kode_alternatif' => $this->input->post('kode_alternatif'),
                'nama_alternatif' => $this->input->post('nama_alternatif')
            ];
            $this->Spk_model->insert_alternatif($data);
            redirect('alternatif');
        }

        // Tampilkan form tambah
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('alternatif/tambah');
        $this->load->view('layout/footer');
    }

    public function edit($id) {
        // Logika update data
        if ($this->input->post()) {
            $data = [
                'kode_alternatif' => $this->input->post('kode_alternatif'),
                'nama_alternatif' => $this->input->post('nama_alternatif')
            ];
            $this->Spk_model->update_alternatif($id, $data);
            redirect('alternatif');
        }

        // Ambil data lama untuk ditampilkan di form
        $data['alt'] = $this->Spk_model->get_alternatif_by_id($id);

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('alternatif/edit', $data);
        $this->load->view('layout/footer');
    }

    public function hapus($id) {
        $this->Spk_model->delete_alternatif($id);
        redirect('alternatif');
    }
}