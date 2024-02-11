<?php
require '../../../app/config.php';
$page = 'inventaris';
include_once '../../layout/navhead.php';

$id = $_GET['id'];
$query = $con->query("SELECT * FROM inventaris WHERE id_inventaris ='$id'");
$row = $query->fetch_array();
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 my-3">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h4 class="mb-0"><i class="fas fa-computer me-2"></i>Edit Data Inventaris</h4>
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
                        <label class="col-sm-2 col-form-label">Kode inventaris</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?= $row['kode'] ?>" disabled>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Nama inventaris</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nm_inventaris" value="<?= $row['nm_inventaris'] ?>" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Kategori inventaris</label>
                        <div class="col-sm-10">
                            <select name="id_kategori" class="form-control select2" style="width: 100%;" required>
                                <option value="">-- Pilih --</option>
                                <?php $data = $con->query("SELECT * FROM kategori ORDER BY id_kategori ASC"); ?>
                                <?php foreach ($data as $d) :
                                    if ($d['id_kategori'] == $row['id_kategori']) { ?>
                                        <option value="<?= $d['id_kategori']; ?>" selected="<?= $d['id_kategori']; ?>"><?= $d['nm_kategori'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $d['id_kategori'] ?>"><?= $d['nm_kategori'] ?></option>
                                <?php }
                                endforeach ?>
                            </select>
                            <div class="invalid-feedback">Kolom harus di pilih !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Satuan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="satuan" value="<?= $row['satuan'] ?>" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal Perolehan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_inventaris" value="<?= $row['tgl_inventaris'] ?>" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Penempatan</label>
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
    $nm_inventaris = $_POST['nm_inventaris'];
    $id_kategori = $_POST['id_kategori'];
    $satuan = $_POST['satuan'];
    $tgl_inventaris = $_POST['tgl_inventaris'];
    $id_ruangan = $_POST['id_ruangan'];

    $update = $con->query("UPDATE inventaris SET 
        nm_inventaris = '$nm_inventaris',
        id_kategori = '$id_kategori',
        satuan = '$satuan',
        tgl_inventaris = '$tgl_inventaris',
        id_ruangan = '$id_ruangan'
        WHERE id_inventaris = '$id'
    ");

    if ($update) {
        $_SESSION['pesan'] = "Data Berhasil di Update";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal diubah. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=edit?id=$id'>";
    }
}
?>