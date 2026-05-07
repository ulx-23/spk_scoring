<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-info">
                        <p class="card-text">Total Karyawan</p>
                        <div class="d-flex align-items-end mb-2">
                            <h4 class="card-title mb-0 me-2"><?= $total_karyawan ?></h4>
                            <small class="text-success">(Orang)</small>
                        </div>
                        <small>Data Kandidat</small>
                    </div>
                    <div class="card-icon">
                        <span class="badge bg-label-primary rounded p-2">
                            <i class='ti ti-users ti-sm'></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-info">
                        <p class="card-text">Peringkat #1</p>
                        <div class="d-flex align-items-end mb-2">
                            <h4 class="card-title mb-0 me-2">
                                <?= ($top_candidate) ? substr($top_candidate['nama'], 0, 10).'..' : '-' ?>
                            </h4>
                        </div>
                        <small>Skor: <?= ($top_candidate) ? number_format($top_candidate['total'], 2) : 0 ?></small>
                    </div>
                    <div class="card-icon">
                        <span class="badge bg-label-warning rounded p-2">
                            <i class='ti ti-trophy ti-sm'></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-info">
                        <p class="card-text">Kriteria Penilaian</p>
                        <div class="d-flex align-items-end mb-2">
                            <h4 class="card-title mb-0 me-2"><?= $total_kriteria ?></h4>
                            <small class="text-info">Indikator</small>
                        </div>
                        <small>Bobot Aktif</small>
                    </div>
                    <div class="card-icon">
                        <span class="badge bg-label-info rounded p-2">
                            <i class='ti ti-list-check ti-sm'></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div class="card-info">
                        <p class="card-text">Status Sistem</p>
                        <div class="d-flex align-items-end mb-2">
                            <h4 class="card-title mb-0 me-2">Ready</h4>
                        </div>
                        <small class="text-success">Calculation OK</small>
                    </div>
                    <div class="card-icon">
                        <span class="badge bg-label-success rounded p-2">
                            <i class='ti ti-server ti-sm'></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    
    <div class="col-12 col-xl-8 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h5 class="card-title mb-0">Grafik Perankingan</h5>
                    <small class="text-muted">Perbandingan Total Nilai Akhir Karyawan</small>
                </div>
            </div>
            <div class="card-body">
                <div id="barChartSkor" style="min-height: 300px;"></div>
            </div>
        </div>
    </div>

    <div class="col-12 col-xl-4 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Analisa Juara</h5>
                <small class="text-muted">Kekuatan Skill: <strong><?= ($top_candidate) ? $top_candidate['nama'] : '-' ?></strong></small>
            </div>
            <div class="card-body">
                <div id="radarChartSkill" style="min-height: 300px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Top 5 Karyawan Terbaik</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Nama Karyawan</th>
                            <th>Total Skor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $rank = 1;
                        // Ambil cuma 5 data teratas
                        $top5 = array_slice($hasil, 0, 5);
                        foreach($top5 as $h): 
                        ?>
                        <tr>
                            <td>
                                <?php if($rank==1) echo '🥇'; elseif($rank==2) echo '🥈'; elseif($rank==3) echo '🥉'; else echo $rank; ?>
                            </td>
                            <td class="fw-bold"><?= $h['nama'] ?></td>
                            <td><span class="badge bg-label-primary"><?= number_format($h['total'], 3) ?></span></td>
                            <td>
                                <?php if($rank==1): ?>
                                    <span class="text-success">Highly Recommended</span>
                                <?php else: ?>
                                    <span class="text-secondary">Alternative</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php $rank++; endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    
    // --- 1. DATA DARI PHP KE JS ---
    var namaKaryawan = <?php echo json_encode(array_column($hasil, 'nama')); ?>;
    var totalSkor = <?php echo json_encode(array_column($hasil, 'total')); ?>;
    
    // Data untuk Radar Chart (Top Candidate Only)
    var labelKriteria = <?php echo json_encode(array_column($list_kriteria, 'nama_kriteria')); ?>;
    var nilaiKriteriaTop = <?php echo ($top_candidate) ? json_encode($top_candidate['detail_raw']) : '[]'; ?>;


    // --- 2. CONFIG BAR CHART (Ranking) ---
    var optionsBar = {
        series: [{
            name: 'Total Nilai',
            data: totalSkor
        }],
        chart: {
            type: 'bar',
            height: 350,
            toolbar: { show: false }
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                horizontal: true, // Bar mendatar agar nama panjang muat
                distributed: true // Warna beda-beda tiap bar
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) { return val.toFixed(3); }
        },
        xaxis: {
            categories: namaKaryawan,
            max: 5.0 // Karena skala max SPK adalah 5
        },
        theme: {
            monochrome: {
                enabled: true,
                color: '#7367F0', // Warna Ungu Vuexy
                shadeTo: 'light',
                shadeIntensity: 0.65
            }
        }
    };
    var chartBar = new ApexCharts(document.querySelector("#barChartSkor"), optionsBar);
    chartBar.render();


    // --- 3. CONFIG RADAR CHART (Analisa Skill) ---
    var optionsRadar = {
        series: [{
            name: 'Nilai Asli (Skala 1-5)',
            data: nilaiKriteriaTop
        }],
        chart: {
            height: 350,
            type: 'radar',
            toolbar: { show: false }
        },
        title: {
            text: ''
        },
        yaxis: {
            max: 5,
            min: 0,
            tickAmount: 5,
        },
        xaxis: {
            categories: labelKriteria
        },
        fill: {
            opacity: 0.2,
            colors: ['#28C76F'] // Warna Hijau
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['#28C76F'],
            dashArray: 0
        },
        markers: {
            size: 5,
            colors: ['#28C76F'],
            strokeColors: '#fff',
            strokeWidth: 2,
        }
    };

    var chartRadar = new ApexCharts(document.querySelector("#radarChartSkill"), optionsRadar);
    chartRadar.render();

});
</script>