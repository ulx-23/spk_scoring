<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Edit Kriteria</h4>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Edit Kriteria</h5>
                <small class="text-muted float-end">ID: #<?= $kriteria->id_kriteria ?></small>
            </div>
            
            <div class="card-body">
                <form action="" method="post">
                    
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Kode Kriteria</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-hash"></i></span>
                                <input type="text" class="form-control" name="kode_kriteria" value="<?= $kriteria->kode_kriteria ?>" required />
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Nama Kriteria</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-file-text"></i></span>
                                <input type="text" class="form-control" name="nama_kriteria" value="<?= $kriteria->nama_kriteria ?>" required />
                            </div>
                        </div>
                    </div>

                    <hr class="my-2 mx-n4" /> <div class="row mt-3">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Bobot Nilai (Desimal)</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-percentage"></i></span>
                                <input type="number" step="0.01" class="form-control" name="bobot" value="<?= $kriteria->bobot ?>" required />
                            </div>
                        </div>

                        <div class="col-md-6 col-12 mb-3 d-flex align-items-end">
                            <div class="alert alert-info w-100 mb-0" role="alert">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ti ti-info-circle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <small><strong>Penting:</strong> Total bobot seluruh kriteria idealnya jika dijumlahkan adalah <strong>1.0 (100%)</strong> agar perhitungan akurat.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-top mt-2">
                        <button type="submit" class="btn btn-primary me-sm-2 me-1">
                            <i class="ti ti-device-floppy me-1"></i> Update Data
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