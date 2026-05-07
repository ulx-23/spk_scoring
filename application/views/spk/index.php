<div class="row">
    <div class="col-12">
        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">SPK /</span> Simple Scoring Dashboard
        </h4>
    </div>
</div>

<div class="row mb-4">
    <div class="col-sm-6 col-xl-4 mb-3">
        <div class="card bg-primary text-white h-100">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span class="opacity-75">Karyawan Terbaik</span>
                        <div class="d-flex align-items-end mt-2">
                            <h3 class="mb-0 me-2 text-white"><?= $hasil_perhitungan[0]['nama'] ?></h3>
                        </div>
                        <small class="opacity-75">Skor: <?= $hasil_perhitungan[0]['total'] ?></small>
                    </div>
                    <div class="avatar bg-white rounded p-2">
                        <i class="ti ti-trophy ti-md text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Total Kandidat</span>
                        <div class="d-flex align-items-end mt-2">
                            <h3 class="mb-0 me-2"><?= count($alternatif) ?></h3>
                            <small class="text-success">(Orang)</small>
                        </div>
                        <small>Data Periode Ini</small>
                    </div>
                    <span class="avatar">
                        <span class="avatar-initial rounded bg-label-info">
                            <i class="ti ti-users ti-md"></i>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-4 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <div class="content-left">
                        <span>Nilai Tertinggi</span>
                        <div class="d-flex align-items-end mt-2">
                            <h3 class="mb-0 me-2"><?= number_format($hasil_perhitungan[0]['total'], 2) ?></h3>
                        </div>
                        <small>Max Score Possible: 5.0</small>
                    </div>
                    <span class="avatar">
                        <span class="avatar-initial rounded bg-label-warning">
                            <i class="ti ti-chart-bar ti-md"></i>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="nav-align-top mb-4">
            
            <ul class="nav nav-pills mb-3" role="tablist">
                <li class="nav-item">
                    <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-hasil" aria-controls="navs-hasil" aria-selected="true">
                        <i class="ti ti-award me-1"></i> Hasil Perankingan
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-proses" aria-controls="navs-proses" aria-selected="false">
                        <i class="ti ti-calculator me-1"></i> Rincian Perhitungan
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="nav-link" role="tab" data-bs-toggle="tab" data-bs-target="#navs-data" aria-controls="navs-data" aria-selected="false">
                        <i class="ti ti-database me-1"></i> Data Mentah
                    </button>
                </li>
            </ul>

            <div class="tab-content shadow-sm">
                
                <div class="tab-pane fade show active" id="navs-hasil" role="tabpanel">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 50px;">Rank</th>
                                    <th>Nama Karyawan</th>
                                    <th>Visualisasi Skor</th>
                                    <th class="text-center">Total Nilai</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $rank = 1;
                                // Mencari nilai max untuk skala progress bar (agar penuh 100%)
                                $max_score = $hasil_perhitungan[0]['total'];
                                
                                foreach($hasil_perhitungan as $row): 
                                    // Hitung persentase bar
                                    $percent = ($row['total'] / 5) * 100; 
                                    $bar_color = ($rank == 1) ? 'bg-primary' : (($rank == 2) ? 'bg-info' : 'bg-secondary');
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php if($rank == 1): ?>
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-warning text-white">1</span>
                                            </div>
                                        <?php elseif($rank == 2): ?>
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-secondary text-white">2</span>
                                            </div>
                                        <?php elseif($rank == 3): ?>
                                            <div class="avatar">
                                                <span class="avatar-initial rounded-circle bg-brown text-white" style="background-color: #cd7f32;">3</span>
                                            </div>
                                        <?php else: ?>
                                            <span class="badge bg-label-secondary rounded-pill p-2"><?= $rank ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start align-items-center user-name">
                                            <div class="avatar-wrapper">
                                                <div class="avatar me-2">
                                                    <span class="avatar-initial rounded-circle bg-label-<?= ($rank==1)?'primary':'secondary' ?>">
                                                        <?= substr($row['nama'], 0, 2) ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <span class="fw-medium"><?= $row['nama'] ?></span>
                                                <small class="text-muted text-truncate">ID: A-0<?= $rank ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="width: 30%;">
                                        <div class="d-flex align-items-center">
                                            <div class="progress w-100" style="height: 8px;">
                                                <div class="progress-bar <?= $bar_color ?>" role="progressbar" style="width: <?= $percent ?>%" aria-valuenow="<?= $percent ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <h6 class="mb-0 text-primary fw-bold"><?= number_format($row['total'], 2) ?></h6>
                                    </td>
                                    <td class="text-center">
                                        <?php if($rank == 1): ?>
                                            <span class="badge bg-success bg-glow">Best Employee</span>
                                        <?php else: ?>
                                            <span class="badge bg-label-secondary">Participant</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php $rank++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <small class="text-muted"><i class="ti ti-info-circle"></i> Ranking diurutkan berdasarkan nilai total tertinggi.</small>
                    </div>
                </div>

                <div class="tab-pane fade" id="navs-proses" role="tabpanel">
                    <h5 class="card-header p-0 mb-3">Matriks Ternormalisasi (Bobot x Nilai)</h5>
                    <div class="table-responsive text-nowrap border rounded">
                        <table class="table table-striped">
                            <thead class="bg-light">
                                <tr>
                                    <th>Alternatif</th>
                                    <?php foreach($kriteria as $k): ?>
                                        <th class="text-center">
                                            <?= $k->kode_kriteria ?> <br>
                                            <span class="badge bg-label-dark" style="font-size: 0.7em;">Bobot: <?= $k->bobot ?></span>
                                        </th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($hasil_perhitungan as $row): ?>
                                <tr>
                                    <td class="fw-medium"><?= $row['nama'] ?></td>
                                    <?php foreach($kriteria as $k): ?>
                                        <td class="text-center"><?= $row['detail'][$k->id_kriteria] ?></td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="navs-data" role="tabpanel">
                    <h5 class="card-header p-0 mb-3">Data Input Penilaian (Skala 1-5)</h5>
                    <div class="table-responsive text-nowrap border rounded">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Alternatif</th>
                                    <?php foreach($kriteria as $k): ?>
                                        <th class="text-center"><?= $k->nama_kriteria ?></th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($alternatif as $a): ?>
                                <tr>
                                    <td><?= $a->nama_alternatif ?></td>
                                    <?php foreach($kriteria as $k): ?>
                                        <td class="text-center">
                                            <?php 
                                            $val = $this->Spk_model->get_nilai_spesifik($a->id_alternatif, $k->id_kriteria);
                                            // Memberikan warna badge berdasarkan nilai
                                            $badge_cls = ($val >= 4) ? 'bg-label-success' : (($val == 3) ? 'bg-label-warning' : 'bg-label-danger');
                                            ?>
                                            <span class="badge <?= $badge_cls ?>"><?= $val ?></span>
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
</div>