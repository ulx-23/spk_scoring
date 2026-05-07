<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk extends CI_Controller {

   public function __construct() {
        parent::__construct();
        // --- TAMBAHKAN KODE INI ---
        if ($this->session->userdata('status') != 'login') {
            redirect('auth');
        }
        // Load model dengan nama 'Spk_model'
        $this->load->model('Spk_model');
        $this->load->helper('url'); 
    }

    public function index() {
        // PERBAIKAN: Gunakan $this->Spk_model (sesuai nama file/class model)
        // BUKAN $this->model_spk
        
        $data['kriteria'] = $this->Spk_model->get_kriteria();
        $data['alternatif'] = $this->Spk_model->get_alternatif();
        
        // --- LOGIKA PERHITUNGAN SIMPLE SCORING ---
        $hasil_akhir = [];
        
        // Cek jika data alternatif tidak kosong untuk menghindari error loop
        if(!empty($data['alternatif'])) {
            foreach ($data['alternatif'] as $alt) {
                $total_nilai = 0;
                $detail_hitung = []; 

                foreach ($data['kriteria'] as $krit) {
                    // PERBAIKAN: Gunakan $this->Spk_model
                    $nilai_mentah = $this->Spk_model->get_nilai_spesifik($alt->id_alternatif, $krit->id_kriteria);
                    
                    // Hitung (Nilai x Bobot)
                    $nilai_bobot = $nilai_mentah * $krit->bobot;
                    
                    $total_nilai += $nilai_bobot;
                    $detail_hitung[$krit->id_kriteria] = $nilai_bobot;
                }

                $hasil_akhir[] = [
                    'nama' => $alt->nama_alternatif,
                    'detail' => $detail_hitung,
                    'total' => $total_nilai
                ];
            }

            // Sorting Ranking (Terbesar ke Terkecil)
            usort($hasil_akhir, function($a, $b) {
                return $b['total'] <=> $a['total'];
            });
        }

        $data['hasil_perhitungan'] = $hasil_akhir;

        // Load Views
       $this->load->view('layout/header');  // CSS & Head
        $this->load->view('layout/sidebar'); // Menu Kiri
        $this->load->view('layout/navbar');  // Menu Atas (Search/Profile)
        $this->load->view('spk/index', $data); // Konten Utama
        $this->load->view('layout/footer');
    }
}