<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spk_model extends CI_Model {

    public function get_kriteria() {
        return $this->db->get('kriteria')->result();
    }

    public function get_alternatif() {
        return $this->db->get('alternatif')->result();
    }

    public function get_penilaian() {
        // Mengambil data nilai digabung dengan bobot kriteria untuk perhitungan
        $this->db->select('penilaian.*, kriteria.bobot, kriteria.kode_kriteria');
        $this->db->from('penilaian');
        $this->db->join('kriteria', 'penilaian.id_kriteria = kriteria.id_kriteria');
        return $this->db->get()->result();
    }
    
    // Fungsi bantuan untuk mengambil nilai spesifik (opsional, untuk view matrix)
    public function get_nilai_spesifik($id_alt, $id_krit) {
        $this->db->where('id_alternatif', $id_alt);
        $this->db->where('id_kriteria', $id_krit);
        $result = $this->db->get('penilaian')->row();
        return ($result) ? $result->nilai : 0;
    }
    public function get_alternatif_by_id($id) {
        return $this->db->get_where('alternatif', ['id_alternatif' => $id])->row();
    }

    public function insert_alternatif($data) {
        return $this->db->insert('alternatif', $data);
    }

    public function update_alternatif($id, $data) {
        $this->db->where('id_alternatif', $id);
        return $this->db->update('alternatif', $data);
    }

    public function delete_alternatif($id) {
        // Hapus juga nilai penilaian terkait agar tidak jadi sampah data
        $this->db->where('id_alternatif', $id);
        $this->db->delete('penilaian');

        // Hapus data alternatif
        $this->db->where('id_alternatif', $id);
        return $this->db->delete('alternatif');
    }
    // === TAMBAHAN UNTUK CRUD KRITERIA ===

    public function get_kriteria_by_id($id) {
        return $this->db->get_where('kriteria', ['id_kriteria' => $id])->row();
    }

    public function insert_kriteria($data) {
        return $this->db->insert('kriteria', $data);
    }

    public function update_kriteria($id, $data) {
        $this->db->where('id_kriteria', $id);
        return $this->db->update('kriteria', $data);
    }

    public function delete_kriteria($id) {
        // Hapus juga data penilaian yang terkait kriteria ini agar database bersih
        $this->db->where('id_kriteria', $id);
        $this->db->delete('penilaian');

        // Hapus kriteria
        $this->db->where('id_kriteria', $id);
        return $this->db->delete('kriteria');
    }
    // === TAMBAHAN UNTUK INPUT PENILAIAN ===

    // Fungsi untuk simpan data penilaian dari form matrix
    public function simpan_penilaian_batch($data_nilai) {
        // $data_nilai formatnya: [id_alternatif][id_kriteria] = nilai
        
        foreach ($data_nilai as $id_alt => $kriteria_nilai) {
            foreach ($kriteria_nilai as $id_krit => $nilai) {
                
                // Cek apakah data sudah ada?
                $cek = $this->db->get_where('penilaian', [
                    'id_alternatif' => $id_alt,
                    'id_kriteria' => $id_krit
                ])->row();

                if ($cek) {
                    // Jika ada, UPDATE
                    $this->db->where('id_penilaian', $cek->id_penilaian);
                    $this->db->update('penilaian', ['nilai' => $nilai]);
                } else {
                    // Jika belum, INSERT
                    $this->db->insert('penilaian', [
                        'id_alternatif' => $id_alt,
                        'id_kriteria' => $id_krit,
                        'nilai' => $nilai
                    ]);
                }
            }
        }
    }
}