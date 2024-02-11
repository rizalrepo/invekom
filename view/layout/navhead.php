<?php

if (!isset($_SESSION['login'])) {
    echo "<script> alert('Silahkan login terlebih dahulu'); </script>";
    echo "<meta http-equiv='refresh' content='0; url=" . base_url('index') . "'>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url() ?>/assets/images/logo.png">

    <!-- Libs CSS -->

    <link href="<?= base_url() ?>/assets/libs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/libs/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/libs/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/libs/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/libs/prismjs/themes/prism-okaidia.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/libs/fontawesome/css/all.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>/assets/libs/swal2/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>/assets/libs/datatable/datatables.min.css" rel="stylesheet">

    <link href="<?= base_url() ?>/assets/libs/select2/select2.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/theme.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/custom.min.css">

    <title>Sistem Informasi Monitoring Inventaris Perangkat Komputer</title>
</head>

<body class="bg-light">
    <div id="db-wrapper">
        <!-- navbar vertical -->
        <!-- Sidebar -->
        <nav class="navbar-vertical navbar">
            <div class="nav-scroller">
                <!-- Brand logo -->
                <div class="text-center">
                    <a class="navbar-brand mb-0" href="#">
                        <small class="text-white fw-bold">Radar Banjarmasin</small>
                    </a>
                </div>
                <!-- Navbar nav -->
                <ul class="navbar-nav flex-column" id="sideNavbar">
                    <?php if ($_SESSION['level'] == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link has-arrow <?php if ($page == 'dashboard') {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/">
                                <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                            </a>
                        </li>
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link has-arrow <?php if (
                                                                $page != 'user' || $page != 'kategori' || $page != 'ruangan' || $page != 'teknisi'
                                                            ) {
                                                                echo 'collapsed';
                                                            } ?>" href="#!" data-bs-toggle="collapse" data-bs-target="#navMaster" aria-expanded="false" aria-controls="navMaster">
                                <i data-feather="layers" class="nav-icon icon-xs me-2">
                                </i> Data Master
                            </a>
                            <div id="navMaster" class="collapse <?php if (
                                                                    $page == 'user' || $page == 'kategori' || $page == 'ruangan' || $page == 'teknisi'
                                                                ) {
                                                                    echo 'show';
                                                                } ?>" data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link <?php if (
                                                                $page == 'user'
                                                            ) {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/user/">
                                            <small>
                                                <i class="fas fa-user me-1"></i>
                                                Data Pengguna
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if (
                                                                $page == 'kategori'
                                                            ) {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/kategori/">
                                            <small>
                                                <i class="fas fa-chart-pie me-1"></i>
                                                Data Kategori Perangkat
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if (
                                                                $page == 'ruangan'
                                                            ) {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/ruangan/">
                                            <small>
                                                <i class="fas fa-building-circle-check me-1"></i>
                                                Data Ruangan
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link <?php if (
                                                                $page == 'teknisi'
                                                            ) {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/teknisi/">
                                            <small>
                                                <i class="fas fa-id-badge me-1"></i>
                                                Data Teknisi
                                            </small>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link has-arrow <?php if ($page == 'inventaris') {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/inventaris/">
                                <i class="nav-icon fas fa-computer me-2"></i> Data Inventaris
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link has-arrow <?php if ($page == 'rusak') {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/rusak/">
                                <i class="nav-icon fas fa-plug-circle-xmark me-2"></i> Data Kerusakan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link has-arrow <?php if ($page == 'baik') {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/baik/">
                                <i class="nav-icon fas fa-plug-circle-check me-2"></i> Data Perbaikan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link has-arrow <?php if ($page == 'mutasi') {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/mutasi/">
                                <i class="nav-icon fas fa-right-left me-2"></i> Data Mutasi
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link has-arrow <?php if ($page == 'musnah') {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/musnah/">
                                <i class="nav-icon fas fa-dumpster-fire me-2"></i> Data Pemusnahan
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link has-arrow" href="#!" data-bs-toggle="collapse" data-bs-target="#navLaporan" aria-expanded="false" aria-controls="navLaporan">
                                <i data-feather="file-text" class="nav-icon icon-xs me-2">
                                </i>Laporan Cetak
                            </a>
                            <div id="navLaporan" class="collapse" data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapInventaris">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Inventaris
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapRusak">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Kerusakan Inventaris
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapBaik">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Perbaikan Inventaris
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapMutasi">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Mutasi Inventaris
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapMusnah">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Pemusnahan Inventaris
                                            </small>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } else if ($_SESSION['level'] == 2) { ?>
                        <li class="nav-item">
                            <a class="nav-link has-arrow <?php if ($page == 'dashboard') {
                                                                echo 'active';
                                                            } ?>" href="<?= base_url() ?>/view/admin/">
                                <i data-feather="home" class="nav-icon icon-xs me-2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link has-arrow" href="#!" data-bs-toggle="collapse" data-bs-target="#navLaporan" aria-expanded="false" aria-controls="navLaporan">
                                <i data-feather="file-text" class="nav-icon icon-xs me-2">
                                </i>Laporan Cetak
                            </a>
                            <div id="navLaporan" class="collapse" data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapInventaris">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Inventaris
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapRusak">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Kerusakan Inventaris
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapBaik">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Perbaikan Inventaris
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapMutasi">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Mutasi Inventaris
                                            </small>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#lapMusnah">
                                            <small>
                                                <i class="far fa-circle me-1"></i>
                                                Pemusnahan Inventaris
                                            </small>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
        <!-- Page content -->
        <div id="page-content">
            <div class="header classList">
                <!-- navbar -->
                <nav class="navbar-classic navbar navbar-expand-lg">
                    <a id="nav-toggle" href="#"><i data-feather="menu" class="nav-icon me-2 icon-xs"></i></a>
                    <!--Navbar nav -->
                    <ul class="navbar-nav navbar-right-wrap ms-auto d-flex nav-top-wrap">
                        <!-- List -->
                        <li class="dropdown ms-2">
                            <a class="btn btn-light btn-icon rounded-circle indicator indicator-primary text-muted" href="#" role="button" id="dropdownNotification" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="icon-xs" data-feather="log-out"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUser">
                                <div class="px-4 pb-0 pt-2">
                                    <div class="lh-1">
                                        <h5 class="mb-1"><?= $_SESSION['nm_user'] ?></h5>
                                    </div>
                                    <div class="dropdown-divider mt-3 mb-2"></div>
                                </div>
                                <ul class="list-unstyled">
                                    <li>
                                        <a class="dropdown-item" href="<?= base_url('edit-pw') ?>">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="key"></i>Ubah Password
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item alert-logout" href="<?= base_url('logout') ?>">
                                            <i class="me-2 icon-xxs dropdown-item-icon" data-feather="power"></i>Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>