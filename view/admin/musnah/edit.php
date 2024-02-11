<?php
require '../../../app/config.php';
$page = 'musnah';
include_once '../../layout/navhead.php';

$id = $_GET['id'];
$query = $con->query("SELECT * FROM musnah r LEFT JOIN inventaris a ON r.id_inventaris = a.id_inventaris LEFT JOIN kategori b ON a.id_kategori = b.id_kategori LEFT JOIN ruangan c ON a.id_ruangan = c.id_ruangan WHERE r.id_musnah = '$id'");
$row = $query->fetch_array();

$kondisiLama = $row['kondisi_lama'];
$invOld = $row['id_inventaris'];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 my-3">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h4 class="mb-0"><i class="fas fa-dumpster-fire me-2"></i>Edit Data Pemusnahan Inventaris</h4>
                </div>
                <div>
                    <a href="index" class="btn btn-sm btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-body border border-dark-info">
                <form class="form-horizontal needs-validation" novalidate method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal musnah</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_musnah" value="<?= $row['tgl_musnah'] ?>" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Pilih Inventaris</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <input type="hidden" name="id_inventaris" id="id_inventaris" value="<?= $row['id_inventaris'] ?>" required>
                                <input type="text" class="form-control" id="inv" value="<?= $row['nm_inventaris'] . ' (' . $row['satuan'] . ')' ?>" required disabled>
                                <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-inventaris"><i class="fas fa-search"></i></span>
                            </div>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Kode Inventaris</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kode" value="<?= $row['kode'] ?>" disabled required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Kategori Inventaris</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kategori" value="<?= $row['nm_kategori'] ?>" disabled required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal Diperoleh</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tgl_inventaris" value="<?= tgl($row['tgl_inventaris']) ?>" disabled required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Penempatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ruangan" value="<?= $row['nm_ruangan'] ?>" disabled required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Kondisi Sebelumnya</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control bg-light" id="kondisi_lama" name="kondisi_lama" value="<?= $row['kondisi_lama'] ?>" readonly required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="ket_musnah" required><?= $row['ket_musnah'] ?></textarea>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 text-end">
                        <div class="col-sm-12">
                            <button type="reset" class="btn btn-sm btn-danger float-right mr-2"><i class="fa fa-times-circle"></i> Batal</button>
                            <button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- row  -->
</div>

<div id="modal-inventaris" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="custom-width-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="custom-width-modalLabel"><i class="fas fa-computer me-2"></i>Data Inventaris</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="card-body text-start">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover table-striped dataTable">
                                    <thead class="bg-dark-info">
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Inventaris</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                            <th>Penempatan</th>
                                            <th>Kondisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = $con->query("SELECT * FROM inventaris a LEFT JOIN kategori b ON a.id_kategori = b.id_kategori LEFT JOIN ruangan c ON a.id_ruangan = c.id_ruangan WHERE a.kondisi != 'Musnah' OR a.id_inventaris = '$row[id_inventaris]' ORDER BY a.id_inventaris DESC");
                                        while ($row = $data->fetch_array()) {
                                        ?>
                                            <tr>
                                                <td align="center" width="5%"><?= $no++ ?></td>
                                                <td align="center"><?= $row['kode'] ?></td>
                                                <td><?= $row['nm_inventaris'] ?></td>
                                                <td align="center"><?= $row['nm_kategori'] ?></td>
                                                <td align="center"><?= tgl($row['tgl_inventaris']) ?></td>
                                                <td align="center"><?= $row['nm_ruangan'] ?></td>
                                                <td align="center">
                                                    <?php
                                                    if ($row['kondisi'] === 'Baik') {
                                                        echo '<span class="badge bg-success p-1"><i class="fas fa-check-circle me-1"></i>' . $row['kondisi'] . '</span>';
                                                    } else if ($row['kondisi'] === 'Rusak') {
                                                        echo '<span class="badge bg-warning p-1"><i class="fa-solid fa-triangle-exclamation me-1"></i>' . $row['kondisi'] . '</span>';
                                                    } else if ($row['kondisi'] === 'Musnah') {
                                                        echo '<span class="badge bg-danger p-1"><i class="fa-solid fa-times-circle me-1"></i>' . $row['kondisi'] . '</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center" width="12%">
                                                    <span data-bs-toggle="tooltip" title="Pilih Inventaris" data-bs-placement="top">
                                                        <span id="select" class="btn btn-success btn-xs text-white" data-id_inventaris="<?= $row['id_inventaris'] ?>" data-kode="<?= $row['kode'] ?>" data-inv="<?= $row['nm_inventaris'] . ' (' . $row['satuan'] . ')' ?>" data-kategori="<?= $row['nm_kategori'] ?>" data-tgl_inventaris="<?= tgl($row['tgl_inventaris']) ?>" data-ruangan="<?= $row['nm_ruangan'] ?>" data-kondisi_lama="<?= $row['kondisi'] ?>"><i class="fa fa-info-circle me-1"></i>Pilih</span>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
include_once '../../layout/footer.php';
?>

<script>
    $(document).ready(function() {
        $(document).on('click', '#select', function() {
            var id_inventaris = $(this).data('id_inventaris');
            var inv = $(this).data('inv');
            var kode = $(this).data('kode');
            var kategori = $(this).data('kategori');
            var tgl_inventaris = $(this).data('tgl_inventaris');
            var ruangan = $(this).data('ruangan');
            var kondisi_lama = $(this).data('kondisi_lama');
            $('#id_inventaris').val(id_inventaris);
            $('#inv').val(inv);
            $('#kode').val(kode);
            $('#kategori').val(kategori);
            $('#tgl_inventaris').val(tgl_inventaris);
            $('#ruangan').val(ruangan);
            $('#kondisi_lama').val(kondisi_lama);
            $('#modal-inventaris').modal('hide');
        });
    });
</script>

<?php
if (isset($_POST['submit'])) {
    $tgl_musnah = $_POST['tgl_musnah'];
    $id_inventaris = $_POST['id_inventaris'];
    $kondisi_lama = $_POST['kondisi_lama'];
    $ket_musnah = $_POST['ket_musnah'];

    $update = $con->query("UPDATE musnah SET 
        tgl_musnah = '$tgl_musnah',
        id_inventaris = '$id_inventaris',
        kondisi_lama = '$kondisi_lama',
        ket_musnah = '$ket_musnah'
        WHERE id_musnah = '$id'
    ");

    if ($update) {

        $con->query("UPDATE inventaris SET kondisi = '$kondisiLama' WHERE id_inventaris = '$invOld' ");
        $con->query("UPDATE inventaris SET kondisi = 'Musnah' WHERE id_inventaris = '$id_inventaris' ");

        $_SESSION['pesan'] = "Data Berhasil di Update";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal diubah. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=edit?id=$id'>";
    }
}
?>