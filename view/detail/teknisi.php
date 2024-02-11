<?php
require '../../../app/configtables.php';
$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
?>

<div id="id<?= $id = $row[0]; ?>" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="custom-width-modalLabel"><i class="fas fa-id-badge me-2"></i>Detail Data Teknisi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            $q = $con->query("SELECT * FROM teknisi WHERE id_teknisi = '$id'");
            $d = $q->fetch_array();

            $today = new DateTime('today');
            $tmt = new DateTime($d['tmt']);
            $ytmt = $today->diff($tmt)->y;
            $mtmt = $today->diff($tmt)->m;
            if ($mtmt == 0) {
                $tmtDiff = $ytmt . ' Tahun';
            } else if ($ytmt == 0) {
                $tmtDiff = $mtmt . ' Bulan';
            } else {
                $tmtDiff = $ytmt . ' Tahun ' . $mtmt . ' Bulan';
            }
            ?>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="card-body" style="text-align: left;">
                            <dl class="row">
                                <dt class="col-sm-3">Kode</dt>
                                <dd class="col-sm-9">: <?= $d['kd_teknisi'] ?></dd>
                                <dt class="col-sm-3">Nama Lengkap</dt>
                                <dd class="col-sm-9">: <?= $d['nm_teknisi'] ?></dd>
                                <dt class="col-sm-3">Nomor Induk KTP</dt>
                                <dd class="col-sm-9">: <?= $d['nik'] ?></dd>
                                <dt class="col-sm-3">Jenis Kelamin</dt>
                                <dd class="col-sm-9">: <?= $d['jk'] ?></dd>
                                <dt class="col-sm-3">Alamat</dt>
                                <dd class="col-sm-9">: <?= $d['alamat'] ?></dd>
                                <dt class="col-sm-3">No. HP</dt>
                                <dd class="col-sm-9">: <?= $d['hp'] ?></dd>
                                <dt class="col-sm-3">Tanggal Masuk</dt>
                                <dd class="col-sm-9">: <?= tgl($d['tmt']) ?></dd>
                                <dt class="col-sm-3">Masa Kerja</dt>
                                <dd class="col-sm-9">: <?= $tmtDiff ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->