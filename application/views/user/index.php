<h4 class="py-3 mb-4"><span class="text-muted fw-light">Pengaturan /</span> Manajemen User</h4>

<div class="card">
    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">Daftar Admin</h5>
            <small class="text-muted">Kelola akses login aplikasi</small>
        </div>
        <a href="<?= base_url('user/tambah') ?>" class="btn btn-primary waves-effect waves-light">
            <i class="ti ti-plus me-1"></i> Tambah User
        </a>
    </div>
    
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th width="5%">No</th>
                    <th>User Profile</th>
                    <th>Username</th>
                    <th class="text-center">Status</th>
                    <th class="text-center" width="15%">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php 
                $no=1; 
                $current_id = $this->session->userdata('id_admin');
                foreach($users as $row): 
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3">
                                    <span class="avatar-initial rounded-circle bg-label-primary">
                                        <?= strtoupper(substr($row->nama_lengkap, 0, 2)) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="fw-medium text-heading"><?= $row->nama_lengkap ?></span>
                                <small class="text-muted">ID: #<?= $row->id_admin ?></small>
                            </div>
                        </div>
                    </td>
                    <td><span class="fw-medium"><?= $row->username ?></span></td>
                    <td class="text-center">
                        <?php if($row->id_admin == $current_id): ?>
                            <span class="badge bg-label-success">Active Now</span>
                        <?php else: ?>
                            <span class="badge bg-label-secondary">Offline</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            
                            <a href="<?= base_url('user/edit/'.$row->id_admin) ?>" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" data-bs-toggle="tooltip" title="Edit User">
                                <i class="ti ti-pencil ti-md"></i>
                            </a>

                            <?php if($row->id_admin != $current_id): ?>
                                <a href="<?= base_url('user/hapus/'.$row->id_admin) ?>" onclick="return confirm('Yakin ingin menghapus user ini?')" class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill" data-bs-toggle="tooltip" title="Hapus User">
                                    <i class="ti ti-trash ti-md"></i>
                                </a>
                            <?php else: ?>
                                <span class="btn btn-icon btn-text-secondary disabled rounded-pill" title="Locked">
                                    <i class="ti ti-lock ti-md"></i>
                                </span>
                            <?php endif; ?>

                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>