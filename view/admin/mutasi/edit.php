<?php
require '../../../app/config.php';
$page = 'mutasi';
include_once '../../layout/navhead.php';

$id = $_GET['id'];
$query = $con->query("SELECT * FROM mutasi r LEFT JOIN inventaris a ON r.id_inventaris = a.id_inventaris LEFT JOIN kategori b ON a.id_kategori = b.id_kategori LEFT JOIN ruangan c ON a.id_ruangan = c.id_ruangan WHERE r.id_mutasi = '$id'");
$row = $query->fetch_array();


$lama = $con->query("SELECT * FROM ruangan WHERE id_ruangan = '$row[id_ruangan_lama]' ")->fetch_array();

$runaganOld = $row['id_ruangan_lama'];
$invOld = $row['id_inventaris'];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 my-3">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h4 class="mb-0"><i class="fas fa-right-left me-2"></i>Edit Data Mutasi Inventaris</h4>
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
                        <label class="col-sm-2 col-form-label">Tanggal Mutasi</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_mutasi" value="<?= $row['tgl_mutasi'] ?>" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Inventaris</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inv" value="<?= $row['nm_inventaris'] . ' (' . $row['satuan'] . ')' ?>" disabled required>
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
                        <label class="col-sm-2 col-form-label">Penempatan Lama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ruangan" value="<?= $lama['nm_ruangan'] ?>" disabled required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Tujuan Penempatan</label>
                        <div class="col-sm-10">
                            <select name="id_ruangan" class="form-control select2" style="width: 100%;" required>
                                <option value="">-- Pilih --</option>
                                <?php $data = $con->query("SELECT * FROM ruangan ORDER BY id_ruangan ASC"); ?>
                                <?php foreach ($data as $d) :
                                    if ($d['id_ruangan'] == $row['id_ruangan']) { ?>
                                        <option value="<?= $d['id_ruangan']; ?>" selected="<?= $d['id_ruangan']; ?>"><?= $d['nm_ruangan'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $d['id_ruangan'] ?>"><?= $d['nm_ruangan'] ?></option>
                                <?php }
                                endforeach ?>
                            </select>
                            <div class="invalid-feedback">Kolom harus di pilih !</div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="ket_mutasi" required><?= $row['ket_mutasi'] ?></textarea>
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


<?php
include_once '../../layout/footer.php';

if (isset($_POST['submit'])) {
    $tgl_mutasi = $_POST['tgl_mutasi'];
    $id_ruangan = $_POST['id_ruangan'];
    $ket_mutasi = $_POST['ket_mutasi'];

    $update = $con->query("UPDATE mutasi SET 
        tgl_mutasi = '$tgl_mutasi',
        id_ruangan = '$id_ruangan',
        ket_mutasi = '$ket_mutasi'
        WHERE id_mutasi = '$id'
    ");

    if ($update) {

        $con->query("UPDATE inventaris SET id_ruangan = '$runaganOld' WHERE id_inventaris = '$invOld' ");
        $con->query("UPDATE inventaris SET id_ruangan = '$id_ruangan' WHERE id_inventaris = '$invOld' ");

        $_SESSION['pesan'] = "Data Berhasil di Update";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal diubah. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=edit?id=$id'>";
    }
}
?>