<h4 class="py-3 mb-4"><span class="text-muted fw-light">Master Data /</span> Data Kriteria</h4>

<div class="card">
    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
        <div>
            <h5 class="card-title mb-0">Daftar Kriteria & Bobot</h5>
            <small class="text-muted">Atur indikator penilaian dan prioritasnya</small>
        </div>
        <a href="<?= base_url('kriteria/tambah') ?>" class="btn btn-primary waves-effect waves-light">
            <i class="ti ti-plus me-1"></i> Tambah Kriteria
        </a>
    </div>
    
    <div class="table-responsive text-nowrap">
        <table class="table table-hover">
            <thead class="table-light">
                <tr>
                    <th width="5%">No</th>
                    <th width="15%">Kode</th>
                    <th>Nama Kriteria</th>
                    <th width="30%">Bobot Prioritas</th>
                    <th width="15%" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <?php $no=1; foreach($kriteria as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td>
                        <span class="badge bg-label-primary rounded-pill">
                            <i class="ti ti-hash me-1 ti-xs"></i> <?= $row->kode_kriteria ?>
                        </span>
                    </td>
                    <td><strong class="text-heading"><?= $row->nama_kriteria ?></strong></td>
                    <td>
                        <div class="d-flex flex-column">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted small">Nilai: <?= $row->bobot ?></span>
                                <span class="fw-bold small"><?= $row->bobot * 100 ?>%</span>
                            </div>
                            <div class="progress" style="height: 6px;">
                                <div class="progress-bar bg-info" role="progressbar" style="width: <?= $row->bobot * 100 ?>%" aria-valuenow="<?= $row->bobot * 100 ?>" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            
                            <a href="<?= base_url('kriteria/edit/'.$row->id_kriteria) ?>" class="btn btn-icon btn-text-secondary waves-effect waves-light rounded-pill" data-bs-toggle="tooltip" title="Edit Kriteria">
                                <i class="ti ti-pencil ti-md"></i>
                            </a>

                            <a href="<?= base_url('kriteria/hapus/'.$row->id_kriteria) ?>" onclick="return confirm('Hapus kriteria ini? Perhitungan akan berubah!')" class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill" data-bs-toggle="tooltip" title="Hapus">
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