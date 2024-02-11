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
                <h5 class="modal-title" id="custom-width-modalLabel"><i class="fas fa-plug-circle-xmark me-2"></i>Detail Data Kerusakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            $q = $con->query("SELECT * FROM rusak r LEFT JOIN inventaris a ON r.id_inventaris = a.id_inventaris LEFT JOIN kategori b ON a.id_kategori = b.id_kategori LEFT JOIN ruangan c ON a.id_ruangan = c.id_ruangan WHERE r.id_rusak = '$id'");
            $d = $q->fetch_array();
            ?>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="card-body text-start">
                            <dl class="row">
                                <dt class="col-sm-3">Tanggal Kerusakan</dt>
                                <dd class="col-sm-9">: <?= tgl($d['tgl_rusak']) ?></dd>
                                <dt class="col-sm-3">Kode Inventaris</dt>
                                <dd class="col-sm-9">: <?= $d['kode'] ?></dd>
                                <dt class="col-sm-3">Nama Inventaris</dt>
                                <dd class="col-sm-9">: <?= $d['nm_inventaris'] ?></dd>
                                <dt class="col-sm-3">Kategori</dt>
                                <dd class="col-sm-9">: <?= $d['nm_kategori'] ?></dd>
                                <dt class="col-sm-3">Satuan</dt>
                                <dd class="col-sm-9">: <?= $d['satuan'] ?></dd>
                                <dt class="col-sm-3">Tanggal Perolehan</dt>
                                <dd class="col-sm-9">: <?= tgl($d['tgl_inventaris']) ?></dd>
                                <dt class="col-sm-3">Penempatan</dt>
                                <dd class="col-sm-9">: <?= $d['nm_ruangan'] ?></dd>
                                <dt class="col-sm-3">Bukti Kerusakan</dt>
                                <dd class="col-sm-9">:
                                    <a href="<?= base_url('storage/rusak/' . $d['foto_rusak']) ?>" target="_blank" class="btn btn-xs btn-primary"><i class="fas fa-camera me-1"></i>Lihat Bukti</a>
                                </dd>
                                <dt class="col-sm-3">Keterangan</dt>
                                <dd class="col-sm-9">: <?= $d['ket_rusak'] ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->