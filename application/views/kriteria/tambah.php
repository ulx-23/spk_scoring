<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Tambah Kriteria</h4>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Kriteria Baru</h5>
                <small class="text-muted float-end">Input indikator penilaian</small>
            </div>
            
            <div class="card-body">
                <form action="" method="post">
                    
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Kode Kriteria</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-hash"></i></span>
                                <input type="text" class="form-control" name="kode_kriteria" placeholder="Contoh: C1" required />
                            </div>
                            <div class="form-text">Kode harus unik (tidak boleh sama).</div>
                        </div>
                        
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Nama Kriteria</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-file-text"></i></span>
                                <input type="text" class="form-control" name="nama_kriteria" placeholder="Contoh: Kedisiplinan" required />
                            </div>
                        </div>
                    </div>

                    <hr class="my-2 mx-n4" /> <div class="row mt-3">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Bobot Nilai (Desimal)</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-percentage"></i></span>
                                <input type="number" step="0.01" class="form-control" name="bobot" placeholder="Contoh: 0.25" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12 mb-3 d-flex align-items-end">
                            <div class="alert alert-info w-100 mb-0" role="alert">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ti ti-info-circle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <small><strong>Format Desimal:</strong> Gunakan titik (.) sebagai pemisah.<br>
                                        Contoh: <strong>0.20</strong> untuk 20%, <strong>0.5</strong> untuk 50%.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-top mt-2">
                        <button type="submit" class="btn btn-primary me-sm-2 me-1">
                            <i class="ti ti-device-floppy me-1"></i> Simpan Data
                        </button>
                        <a href="<?= base_url('kriteria') ?>" class="btn btn-label-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Batal
                        </a>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>