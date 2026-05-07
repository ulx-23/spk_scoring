<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

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
        // Jika tombol simpan ditekan
        if ($this->input->post('simpan_nilai')) {
            $nilai = $this->input->post('nilai'); // Ambil array nilai dari form
            $this->Spk_model->simpan_penilaian_batch($nilai);
            
            // Set flashdata untuk notifikasi sukses (opsional)
            // redirect ke halaman SPK hasil
            redirect('spk'); 
        }

        // Ambil data untuk form
        $data['alternatif'] = $this->Spk_model->get_alternatif();
        $data['kriteria'] = $this->Spk_model->get_kriteria();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('penilaian/index', $data);
        $this->load->view('layout/footer');
    }
}