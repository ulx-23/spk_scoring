<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // --- TAMBAHKAN KODE INI ---
        if ($this->session->userdata('status') != 'login') {
            redirect('auth');
        }
        $this->load->model('Spk_model');
        $this->load->helper('url');
    }

    // Fungsi Privat untuk hitung SPK (Agar tidak menulis ulang kode)
    private function _hitung_spk() {
        $kriteria = $this->Spk_model->get_kriteria();
        $alternatif = $this->Spk_model->get_alternatif();
        
        $hasil_akhir = [];
        if(!empty($alternatif)) {
            foreach ($alternatif as $alt) {
                $total_nilai = 0;
                $detail_hitung = [];

                foreach ($kriteria as $krit) {
                    $nilai_mentah = $this->Spk_model->get_nilai_spesifik($alt->id_alternatif, $krit->id_kriteria);
                    $nilai_bobot = $nilai_mentah * $krit->bobot;
                    $total_nilai += $nilai_bobot;
                }

                $hasil_akhir[] = [
                    'nama' => $alt->nama_alternatif,
                    'kode' => $alt->kode_alternatif,
                    'total' => $total_nilai
                ];
            }

            // Sorting Ranking Tertinggi
            usort($hasil_akhir, function($a, $b) {
                return $b['total'] <=> $a['total'];
            });
        }
        return $hasil_akhir;
    }

    public function index() {
        $data['hasil'] = $this->_hitung_spk();
        
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('laporan/index', $data);
        $this->load->view('layout/footer');
    }

    public function cetak() {
        $data['hasil'] = $this->_hitung_spk();
        $data['tanggal'] = date('d F Y'); // Tanggal hari ini
        
        // Load view khusus cetak (tanpa header/sidebar dashboard)
        $this->load->view('laporan/cetak', $data);
    }
}