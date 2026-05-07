<h4 class="py-3 mb-4"><span class="text-muted fw-light">Analisa SPK /</span> Input Nilai</h4>

<div class="row">
    <div class="col-12">
        
        <div class="alert alert-primary d-flex align-items-center" role="alert">
            <span class="alert-icon text-primary me-2">
                <i class="ti ti-info-circle ti-xs"></i>
            </span>
            <span>
                Masukkan nilai <strong>1 (Sangat Buruk)</strong> sampai <strong>5 (Sangat Baik)</strong> untuk setiap kriteria.
            </span>
        </div>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Form Penilaian Karyawan</h5>
            </div>
            
            <div class="card-body">
                <form action="" method="post">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-bordered table-hover">
                            <thead class="table-light text-center">
                                <tr>
                                    <th style="width: 50px;">No</th>
                                    <th style="text-align: left;">Nama Karyawan</th>
                                    
                                    <?php foreach($kriteria as $k): ?>
                                        <th style="width: 150px;">
                                            <?= $k->kode_kriteria ?> <br>
                                            <small class="text-muted" style="font-size:0.7em"><?= $k->nama_kriteria ?></small>
                                        </th>
                                    <?php endforeach; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1; foreach($alternatif as $a): ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td class="fw-bold"><?= $a->nama_alternatif ?></td>
                                    
                                    <?php foreach($kriteria as $k): ?>
                                        <td>
                                            <?php 
                                            // Ambil nilai lama jika ada
                                            $val = $this->Spk_model->get_nilai_spesifik($a->id_alternatif, $k->id_kriteria);
                                            // Jika kosong, set default 0 atau kosong
                                            $val = ($val != 0) ? $val : '';
                                            ?>
                                            
                                            <input type="number" 
                                                   name="nilai[<?= $a->id_alternatif ?>][<?= $k->id_kriteria ?>]" 
                                                   class="form-control text-center" 
                                                   value="<?= $val ?>" 
                                                   min="1" max="5" 
                                                   required
                                                   placeholder="0">
                                        </td>
                                    <?php endforeach; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 text-end">
                        <button type="reset" class="btn btn-label-secondary me-2">Reset</button>
                        <button type="submit" name="simpan_nilai" value="true" class="btn btn-primary">
                            <i class="ti ti-device-floppy me-1"></i> Simpan & Hitung
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>