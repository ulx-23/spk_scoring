<?php
// MENGAMBIL DATA DARI SESSION LOGIN
$id_user   = $this->session->userdata('id_admin');
$nama_user = $this->session->userdata('nama');

// Jaga-jaga jika session kosong (tapi harusnya tidak karena sudah dicek di controller)
if (empty($nama_user)) {
    $nama_user = "Admin";
}

// LOGIKA MEMBUAT INISIAL (Ambil 2 huruf pertama dari nama)
$inisial = strtoupper(substr($nama_user, 0, 2));
?>

<div class="layout-page">
  
  <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
        <i class="ti ti-menu-2 ti-sm"></i>
      </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
      
      <div class="navbar-nav align-items-center">
        <div class="nav-item navbar-search-wrapper mb-0">
          <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
            <i class="ti ti-search ti-md me-2"></i>
            <span class="d-none d-md-inline-block text-muted">Pencarian data...</span>
          </a>
        </div>
      </div>
      <ul class="navbar-nav flex-row align-items-center ms-auto">
        
        <li class="nav-item navbar-dropdown dropdown-user dropdown">
          <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
            <div class="avatar avatar-online">
              <span class="avatar-initial rounded-circle bg-label-primary"><?= $inisial ?></span>
            </div>
          </a>
          
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="<?= base_url('user/edit/' . $id_user) ?>">
                <div class="d-flex">
                  <div class="flex-shrink-0 me-3">
                    <div class="avatar avatar-online">
                      <span class="avatar-initial rounded-circle bg-label-primary"><?= $inisial ?></span>
                    </div>
                  </div>
                  <div class="flex-grow-1">
                    <span class="fw-medium d-block"><?= $nama_user ?></span>
                    <small class="text-muted">Administrator</small>
                  </div>
                </div>
              </a>
            </li>
            
            <li>
              <div class="dropdown-divider"></div>
            </li>
            
            <li>
              <a class="dropdown-item" href="<?= base_url('user') ?>">
                <i class="ti ti-settings me-2 ti-sm"></i>
                <span class="align-middle">Manajemen User</span>
              </a>
            </li>
            
            <li>
              <div class="dropdown-divider"></div>
            </li>
            
            <li>
              <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">
                <i class="ti ti-logout me-2 ti-sm"></i>
                <span class="align-middle">Log Out</span>
              </a>
            </li>
          </ul>
        </li>
        </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">