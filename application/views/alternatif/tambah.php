<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Tambah Karyawan</h4>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Tambah Data</h5>
                <small class="text-muted float-end">Input data kandidat baru</small>
            </div>
            
            <div class="card-body">
                <form action="" method="post">
                    
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Kode Alternatif</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-hash"></i></span>
                                <input type="text" class="form-control" name="kode_alternatif" placeholder="Contoh: A5" required />
                            </div>
                            <div class="form-text">Kode unik untuk identifikasi (Ex: A1, A2).</div>
                        </div>
                        
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-user"></i></span>
                                <input type="text" class="form-control" name="nama_alternatif" placeholder="Nama Karyawan" required />
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info d-flex align-items-center mt-1" role="alert">
                        <span class="alert-icon text-info me-2">
                            <i class="ti ti-info-circle ti-xs"></i>
                        </span>
                        <span>Data karyawan yang ditambahkan di sini akan otomatis muncul di menu <strong>Input Nilai</strong> untuk proses penilaian selanjutnya.</span>
                    </div>
                    
                    <div class="pt-4 border-top mt-2">
                        <button type="submit" class="btn btn-primary me-sm-2 me-1">
                            <i class="ti ti-device-floppy me-1"></i> Simpan Data
                        </button>
                        <a href="<?= base_url('alternatif') ?>" class="btn btn-label-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Batal
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>