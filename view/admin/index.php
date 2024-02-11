<?php
require '../../app/config.php';
$page = 'dashboard';
include_once '../layout/navhead.php';

$a = $con->query("SELECT COUNT(*) AS total FROM inventaris WHERE kondisi != 'Musnah' ")->fetch_array();
$b = $con->query("SELECT COUNT(*) AS total FROM rusak")->fetch_array();
$c = $con->query("SELECT COUNT(*) AS total FROM baik")->fetch_array();
$d = $con->query("SELECT COUNT(*) AS total FROM mutasi")->fetch_array();
$e = $con->query("SELECT COUNT(*) AS total FROM musnah")->fetch_array();
?>

<!-- Container fluid -->
<div class="bg-dark-info pt-5 pb-21"></div>
<div class="container-fluid mt-n22">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 text-white">Sistem Informasi Inventaris Perangkat Komputer</h3>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon-shape icon-md bg-light-info text-info rounded-2">
                            <i class="fas fa-computer fs-4"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Data Inventaris</h4>
                            <span class="text-success small pt-1 fw-bold"><?= $a['total'] ?></span>
                            <span class="text-muted small pt-2 ps-1 fw-semibold">Total Data</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon-shape icon-md bg-light-info text-info rounded-2">
                            <i class="fas fa-plug-circle-xmark fs-4"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Data Kerusakan</h4>
                            <span class="text-success small pt-1 fw-bold"><?= $b['total'] ?></span>
                            <span class="text-muted small pt-2 ps-1 fw-semibold">Total Data</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon-shape icon-md bg-light-info text-info rounded-2">
                            <i class="fas fa-plug-circle-check fs-4"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Data Perbaikan</h4>
                            <span class="text-success small pt-1 fw-bold"><?= $c['total'] ?></span>
                            <span class="text-muted small pt-2 ps-1 fw-semibold">Total Data</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon-shape icon-md bg-light-info text-info rounded-2">
                            <i class="fas fa-right-left fs-4"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Data Mutasi</h4>
                            <span class="text-success small pt-1 fw-bold"><?= $d['total'] ?></span>
                            <span class="text-muted small pt-2 ps-1 fw-semibold">Total Data</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 col-12 mt-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon-shape icon-md bg-light-info text-info rounded-2">
                            <i class="fas fa-dumpster-fire fs-4"></i>
                        </div>
                        <div class="ps-3">
                            <h4>Data Pemusnahan</h4>
                            <span class="text-success small pt-1 fw-bold"><?= $e['total'] ?></span>
                            <span class="text-muted small pt-2 ps-1 fw-semibold">Total Data</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row  -->
</div>

<?php
include_once '../layout/footer.php';
?>