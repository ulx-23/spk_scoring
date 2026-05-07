<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Data Karyawan</h4>

<div class="card">
    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">Daftar Alternatif (Karyawan)</h5>
            <small class="text-muted">Kelola data kandidat penilaian</small>
        </div>
        <a href="<?= base_url('alternatif/tambah') ?>" class="btn btn-primary waves-effect waves-light">
            <i class="ti ti-plus me-1"></i> Tambah Data
        </a>
    </div>
    
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Kode</th>
                    <th>Nama Karyawan</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php $no=1; foreach($alternatif as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <span class="badge bg-label-primary rounded-pill">
                            <i class="ti ti-id me-1 ti-xs"></i> <?= $row->kode_alternatif ?>
                        </span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-start align-items-center user-name">
                            <div class="avatar-wrapper">
                                <div class="avatar avatar-sm me-3">
                                    <span class="avatar-initial rounded-circle bg-label-info">
                                        <?= strtoupper(substr($row->nama_alternatif, 0, 2)) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="d-flex flex-column">
                                <span class="fw-medium text-heading"><?= $row->nama_alternatif ?></span>
                                <small class="text-muted">Kandidat</small>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            
                            <a href="<?= base_url('alternatif/edit/'.$row->id_alternatif) ?>" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" data-bs-toggle="tooltip" title="Edit Data">
                                <i class="ti ti-pencil ti-md"></i>
                            </a>

                            <a href="<?= base_url('alternatif/hapus/'.$row->id_alternatif) ?>" onclick="return confirm('Yakin ingin menghapus data karyawan ini? Data penilaian terkait juga akan terhapus.')" class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill" data-bs-toggle="tooltip" title="Hapus Data">
                                <i class="ti ti-trash ti-md"></i>
                            </a>

                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>