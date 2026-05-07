<h4 class="py-3 mb-4"><span class="text-muted fw-light">Manajemen User /</span> Edit User</h4>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Data Admin</h5>
                <small class="text-muted float-end">ID: #<?= $user->id_admin ?></small>
            </div>
            
            <div class="card-body">
                <form action="" method="post">
                    
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-user"></i></span>
                                <input type="text" class="form-control" name="nama_lengkap" value="<?= $user->nama_lengkap ?>" placeholder="Nama Lengkap" required />
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Username</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="ti ti-id"></i></span>
                                <input type="text" class="form-control" name="username" value="<?= $user->username ?>" placeholder="Username" required />
                            </div>
                        </div>
                    </div>

                    <hr class="my-2 mx-n4" /> <div class="row mt-3">
                        <div class="col-md-6 col-12 mb-3">
                            <label class="form-label">Ganti Password (Opsional)</label>
                            <div class="form-password-toggle">
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="ti ti-key"></i></span>
                                    <input type="password" class="form-control" name="password" placeholder="Biarkan kosong jika tidak ingin mengganti" />
                                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-12 mb-3 d-flex align-items-end">
                            <div class="alert alert-warning w-100 mb-0" role="alert">
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ti ti-alert-triangle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <small>Keamanan akun sangat penting. Gunakan kombinasi huruf dan angka jika mengganti password.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="pt-4 border-top mt-2">
                        <button type="submit" class="btn btn-primary me-sm-2 me-1">
                            <i class="ti ti-device-floppy me-1"></i> Simpan Perubahan
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