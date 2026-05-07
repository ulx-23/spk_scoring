<h4 class="py-3 mb-4"><span class="text-muted fw-light">Manajemen User /</span> Tambah Baru</h4>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Form Tambah Admin</h5>
                <small class="text-muted float-end">Buat akun baru</small>
            </div>
            
            <div class="card-body">
                <form action="" method="post">
                    
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-user"></i></span>
                                <input type="text" class="form-control" name="nama_lengkap" placeholder="Contoh: Ulul Azmi" required />
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Username</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-id"></i></span>
                                <input type="text" class="form-control" name="username" placeholder="Username login" required />
                            </div>
                        </div>
                    </div>

                    <hr class="my-2 mx-n4" /> <div class="row mt-3">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Password</label>
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-key"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Masukan password" required />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 mb-3 d-flex align-items-end">
                            <div class="alert alert-primary w-100 mb-0" role="alert">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ti ti-info-circle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <small>Pastikan username unik. Password dapat diubah kembali oleh admin yang bersangkutan nanti.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-top mt-2">
                        <button type="submit" class="btn btn-primary me-sm-2 me-1">
                            <i class="ti ti-device-floppy me-1"></i> Simpan Data
                        </button>
                        <a href="<?= base_url('user') ?>" class="btn btn-label-secondary">
                            <i class="ti ti-arrow-left me-1"></i> Batal
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>