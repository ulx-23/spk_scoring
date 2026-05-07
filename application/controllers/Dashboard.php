<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        // 1. AMBIL DATA
        $kriteria = $this->Spk_model->get_kriteria();
        $alternatif = $this->Spk_model->get_alternatif();
        
        // 2. LAKUKAN PERHITUNGAN SPK (Agar dapat data untuk Grafik)
        $hasil_akhir = [];
        if(!empty($alternatif)) {
            foreach ($alternatif as $alt) {
                $total_nilai = 0;
                $detail_per_kriteria = [];

                foreach ($kriteria as $krit) {
                    $nilai_mentah = $this->Spk_model->get_nilai_spesifik($alt->id_alternatif, $krit->id_kriteria);
                    $nilai_bobot = $nilai_mentah * $krit->bobot;
                    $total_nilai += $nilai_bobot;
                    
                    // Simpan nilai mentah untuk grafik Radar (Analisa Skill)
                    $detail_per_kriteria[] = $nilai_mentah; 
                }

                $hasil_akhir[] = [
                    'nama' => $alt->nama_alternatif,
                    'total' => $total_nilai,
                    'detail_raw' => $detail_per_kriteria // Nilai 1-5 asli
                ];
            }

            // Sorting Ranking
            usort($hasil_akhir, function($a, $b) {
                return $b['total'] <=> $a['total'];
            });
        }

        // 3. SIAPKAN DATA UNTUK VIEW
        $data['total_karyawan'] = count($alternatif);
        $data['total_kriteria'] = count($kriteria);
        $data['top_candidate']  = !empty($hasil_akhir) ? $hasil_akhir[0] : null;
        $data['hasil']          = $hasil_akhir; // Seluruh data ranking
        $data['list_kriteria']  = $kriteria;    // Untuk label grafik radar

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('layout/footer');
    }
}