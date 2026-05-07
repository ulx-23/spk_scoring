<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan SPK</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <style>
        /* CSS Khusus Print */
        body { font-family: "Times New Roman", Times, serif; color: #000; background: #fff; }
        .header-laporan { border-bottom: 2px solid #000; margin-bottom: 20px; padding-bottom: 10px; }
        .logo-placeholder { width: 80px; height: 80px; background: #ddd; display: flex; align-items: center; justify-content: center; float: left; margin-right: 15px; }
        
        @media print {
            @page { size: A4; margin: 2cm; }
            .btn-print { display: none; } /* Sembunyikan tombol print saat dicetak */
        }
    </style>
</head>
<body onload="window.print()">

<div class="container mt-4">
    
    <div class="header-laporan text-center">
        <h3 class="font-weight-bold m-0">PT. PERUSAHAAN ANDA</h3>
        <p class="m-0">Jl. Raya Bireuen - Takengon Km. 3, Aceh, Indonesia</p>
        <p class="m-0 small">Telp: (0644) 123456 | Email: info@perusahaan.com</p>
    </div>

    <div class="text-center mb-4">
        <h5 class="font-weight-bold">LAPORAN HASIL PENILAIAN KARYAWAN TERBAIK</h5>
        <p>Metode: Simple Scoring</p>
    </div>

    <table class="table table-bordered table-sm">
        <thead>
            <tr class="bg-light text-center">
                <th width="50px">No</th>
                <th>Nama Karyawan</th>
                <th>Total Skor</th>
                <th>Peringkat</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach($hasil as $row): 
            ?>
            <tr>
                <td class="text-center"><?= $no ?></td>
                <td><?= $row['nama'] ?></td>
                <td class="text-center font-weight-bold"><?= number_format($row['total'], 3) ?></td>
                <td class="text-center"><?= $no ?></td>
                <td class="text-center">
                    <?= ($no == 1) ? 'DIREKOMENDASIKAN' : 'Peserta' ?>
                </td>
            </tr>
            <?php $no++; endforeach; ?>
        </tbody>
    </table>

    <div class="row mt-5">
        <div class="col-md-4 offset-md-8 text-center">
            <p>Bireuen, <?= $tanggal ?></p>
            <p>Mengetahui, <br>Manager HRD</p>
            <br><br><br><br>
            <p class="font-weight-bold"><u>( Nama Manager )</u></p>
            <p>NIP. 19800101 202301 1 001</p>
        </div>
    </div>

</div>

</body>
</html>