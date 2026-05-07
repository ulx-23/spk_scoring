<h4 class="py-3 mb-4"><span class="text-muted fw-light">Laporan /</span> Hasil Akhir</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Laporan Keputusan Pemilihan Karyawan</h5>
        <a href="<?= base_url('laporan/cetak') ?>" target="_blank" class="btn btn-primary">
            <i class="ti ti-printer me-1"></i> Cetak Laporan
        </a>
    </div>
    
    <div class="card-body">
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <span class="alert-icon text-warning me-2">
                <i class="ti ti-alert-triangle ti-xs"></i>
            </span>
            <span>Pastikan semua penilaian sudah diinput sebelum mencetak laporan ini.</span>
        </div>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="table-dark">
                    <th class="text-center" width="5%">Rank</th>
                    <th width="15%">Kode</th>
                    <th>Nama Karyawan</th>
                    <th class="text-center">Total Nilai</th>
                    <th class="text-center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $rank = 1;
                foreach($hasil as $row): 
                ?>
                <tr>
                    <td class="text-center fw-bold"><?= $rank ?></td>
                    <td><?= $row['kode'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td class="text-center fw-bold"><?= number_format($row['total'], 3) ?></td>
                    <td class="text-center">
                        <?php if($rank == 1): ?>
                            <span class="badge bg-success">Sangat Layak (Rekomendasi)</span>
                        <?php elseif($rank <= 3): ?>
                            <span class="badge bg-info">Layak</span>
                        <?php else: ?>
                            <span class="badge bg-secondary">Dipertimbangkan</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php $rank++; endforeach; ?>
            </tbody>
        </table>
    </div>
</div>