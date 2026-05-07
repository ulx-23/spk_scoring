<?php
// Logika untuk mendeteksi controller aktif
$uri1 = $this->uri->segment(1);
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  
  <div class="app-brand demo">
    <a href="<?= base_url('dashboard') ?>" class="app-brand-link">
      
      <span class="app-brand-logo demo">
        <div class="bg-primary d-flex align-items-center justify-content-center rounded" style="width: 32px; height: 32px;">
            <i class="ti ti-chart-pie-2 text-white ti-sm"></i>
        </div>
      </span>
      <span class="app-brand-text demo menu-text fw-bold">SPK ZAKIA</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    
    <li class="menu-item <?= ($uri1 == '' || $uri1 == 'dashboard') ? 'active' : '' ?>">
      <a href="<?= base_url('dashboard') ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-smart-home"></i>
        <div data-i18n="Dashboard">Dashboard</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Master Data</span>
    </li>

    <li class="menu-item <?= ($uri1 == 'kriteria' || $uri1 == 'alternatif') ? 'active open' : '' ?>">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons ti ti-database"></i>
        <div data-i18n="Data Master">Data Master</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item <?= ($uri1 == 'alternatif') ? 'active' : '' ?>">
          <a href="<?= base_url('alternatif') ?>" class="menu-link">
            <div data-i18n="Data Karyawan">Data Karyawan</div>
          </a>
        </li>
        <li class="menu-item <?= ($uri1 == 'kriteria') ? 'active' : '' ?>">
          <a href="<?= base_url('kriteria') ?>" class="menu-link">
            <div data-i18n="Data Kriteria">Data Kriteria</div>
          </a>
        </li>
      </ul>
    </li>

    <li class="menu-item <?= ($uri1 == 'penilaian') ? 'active' : '' ?>">
      <a href="<?= base_url('penilaian') ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-pencil"></i>
        <div data-i18n="Input Nilai">Input Nilai</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Analisa SPK</span>
    </li>
    
    <li class="menu-item <?= ($uri1 == 'spk') ? 'active' : '' ?>">
      <a href="<?= base_url('spk') ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-chart-pie-2"></i>
        <div data-i18n="Simple Scoring">Simple Scoring</div>
        <div class="badge bg-label-primary rounded-pill ms-auto">Utama</div>
      </a>
    </li>

    <li class="menu-item <?= ($uri1 == 'laporan') ? 'active' : '' ?>">
      <a href="<?= base_url('laporan') ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-file-analytics"></i>
        <div data-i18n="Laporan Akhir">Laporan Akhir</div>
      </a>
    </li>

    <li class="menu-header small text-uppercase">
      <span class="menu-header-text">Lainnya</span>
    </li>

   <li class="menu-item <?= ($uri1 == 'user') ? 'active' : '' ?>">
      <a href="<?= base_url('user') ?>" class="menu-link">
        <i class="menu-icon tf-icons ti ti-users-group"></i> <div data-i18n="Manajemen User">Manajemen User</div>
      </a>
    </li>

  </ul>
</aside>