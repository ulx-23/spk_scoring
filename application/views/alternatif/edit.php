<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Edit Karyawan</h4>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Edit Data</h5>
                <small class="text-muted float-end">ID: #<?= $alt->id_alternatif ?></small>
            </div>
            
            <div class="card-body">
                <form action="" method="post">
                    
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Kode Alternatif</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-hash"></i></span>
                                <input type="text" class="form-control" name="kode_alternatif" value="<?= $alt->kode_alternatif ?>" required />
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-user"></i></span>
                                <input type="text" class="form-control" name="nama_alternatif" value="<?= $alt->nama_alternatif ?>" required />
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-warning d-flex align-items-center mt-1" role="alert">
                        <span class="alert-icon text-warning me-2">
                            <i class="ti ti-alert-triangle ti-xs"></i>
                        </span>
                        <span>Perubahan nama atau kode akan otomatis diperbarui di seluruh riwayat penilaian dan laporan.</span>
                    </div>
                    
                    <div class="pt-4 border-top mt-2">
                        <button type="submit" class="btn btn-primary me-sm-2 me-1">
                            <i class="ti ti-device-floppy me-1"></i> Update Data
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