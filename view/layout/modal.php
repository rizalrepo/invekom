<?php
$kondisi = [
    '' => '-- Pilih --',
    'Baik' => 'Baik',
    'Rusak' => 'Rusak',
    'Musnah' => 'Musnah',
];
?>

<div class="modal fade" id="lapInventaris" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i data-feather="file-text" class="me-2"></i>Laporan Data Inventaris</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal needs-validation" novalidate method="GET" target="_blank" action="<?= base_url('view/laporan/inventaris') ?>">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label class="col-form-label fw-semibold">Berdasarkan Penempatan </label>
                                <select name="ruangan" class="form-select" id="selectRuangan" style="width: 100%;">
                                    <option value="">-- Pilih --</option>
                                    <?php $data = $con->query("SELECT * FROM ruangan ORDER BY id_ruangan ASC"); ?>
                                    <?php foreach ($data as $row) : ?>
                                        <option value="<?= $row['id_ruangan'] ?>"><?= $row['nm_ruangan'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <label class="col-form-label fw-semibold">Berdasarkan Kondisi</label>
                                <?= form_dropdown('kondisi', $kondisi, '', 'class="form-select"') ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark-info text-light"><i class="fa fa-print me-1"></i> Cetak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="lapRusak" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i data-feather="file-text" class="me-2"></i>Laporan Data Kerusakan Inventaris</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal needs-validation" novalidate method="GET" target="_blank" action="<?= base_url('view/laporan/rusak') ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dari Tanggal</label>
                                            <input type="date" class="form-control tglRusak1" name="tgl1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sampai Tanggal</label>
                                            <input type="date" class="form-control tglRusak2" name="tgl2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark-info text-light"><i class="fa fa-print me-1"></i> Cetak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="lapBaik" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i data-feather="file-text" class="me-2"></i>Laporan Data Perbaikan Inventaris</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal needs-validation" novalidate method="GET" target="_blank" action="<?= base_url('view/laporan/baik') ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dari Tanggal</label>
                                            <input type="date" class="form-control tglBaik1" name="tgl1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sampai Tanggal</label>
                                            <input type="date" class="form-control tglBaik2" name="tgl2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark-info text-light"><i class="fa fa-print me-1"></i> Cetak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="lapMutasi" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i data-feather="file-text" class="me-2"></i>Laporan Data Mutasi Inventaris</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal needs-validation" novalidate method="GET" target="_blank" action="<?= base_url('view/laporan/mutasi') ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dari Tanggal</label>
                                            <input type="date" class="form-control tglMutasi1" name="tgl1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sampai Tanggal</label>
                                            <input type="date" class="form-control tglMutasi2" name="tgl2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark-info text-light"><i class="fa fa-print me-1"></i> Cetak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="lapMusnah" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i data-feather="file-text" class="me-2"></i>Laporan Data Pemusnahan Inventaris</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal needs-validation" novalidate method="GET" target="_blank" action="<?= base_url('view/laporan/musnah') ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Dari Tanggal</label>
                                            <input type="date" class="form-control tglMusnah1" name="tgl1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sampai Tanggal</label>
                                            <input type="date" class="form-control tglMusnah2" name="tgl2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark-info text-light"><i class="fa fa-print me-1"></i> Cetak</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>

<script>
    $(function() {
        $('#selectRuangan').select2({
            dropdownParent: $('#lapInventaris')
        });
    });

    $(".tglRusak1").change(function() {
        if ($(".tglRusak1 option:selected").val() != '') {
            $('.tglRusak2').prop('required', true);
        } else {
            $('.tglRusak2').removeAttr('required');
        }
    });

    $(".tglRusak2").change(function() {
        if ($(".tglRusak2 option:selected").val() != '') {
            $('.tglRusak1').prop('required', true);
        } else {
            $('.tglRusak1').removeAttr('required');
        }
    });


    $(".tglBaik1").change(function() {
        if ($(".tglBaik1 option:selected").val() != '') {
            $('.tglBaik2').prop('required', true);
        } else {
            $('.tglBaik2').removeAttr('required');
        }
    });

    $(".tglBaik2").change(function() {
        if ($(".tglBaik2 option:selected").val() != '') {
            $('.tglBaik1').prop('required', true);
        } else {
            $('.tglBaik1').removeAttr('required');
        }
    });

    $(".tglMutasi1").change(function() {
        if ($(".tglMutasi1 option:selected").val() != '') {
            $('.tglMutasi2').prop('required', true);
        } else {
            $('.tglMutasi2').removeAttr('required');
        }
    });

    $(".tglMutasi2").change(function() {
        if ($(".tglMutasi2 option:selected").val() != '') {
            $('.tglMutasi1').prop('required', true);
        } else {
            $('.tglMutasi1').removeAttr('required');
        }
    });

    $(".tglMusnah1").change(function() {
        if ($(".tglMusnah1 option:selected").val() != '') {
            $('.tglMusnah2').prop('required', true);
        } else {
            $('.tglMusnah2').removeAttr('required');
        }
    });

    $(".tglMusnah2").change(function() {
        if ($(".tglMusnah2 option:selected").val() != '') {
            $('.tglMusnah1').prop('required', true);
        } else {
            $('.tglMusnah1').removeAttr('required');
        }
    });
</script>