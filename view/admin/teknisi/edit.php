<?php
require '../../../app/config.php';
$page = 'teknisi';
include_once '../../layout/navhead.php';

$id = $_GET['id'];
$query = $con->query("SELECT * FROM teknisi WHERE id_teknisi = '$id'");
$row = $query->fetch_array();

$jk2 = [
    '' => '-- Pilih --',
    'Laki-laki' => 'Laki-laki',
    'Perempuan' => 'Perempuan',
];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 my-3">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h4 class="mb-0"><i class="fas fa-id-badge me-2"></i>Edit Data Teknisi</h4>
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
                        <label class="col-sm-2 col-form-label">Kode Teknisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control bg-light" value="<?= $row['kd_teknisi'] ?>" readonly>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nm_teknisi" value="<?= $row['nm_teknisi'] ?>" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Nomor Induk KTP</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="nik" value="<?= $row['nik'] ?>" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <?= form_dropdown('jk', $jk2, $row['jk'], 'class="form-select" required') ?>
                            <div class="invalid-feedback">Kolom harus di pilih !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" class="form-control" required><?= $row['alamat'] ?></textarea>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="hp" value="<?= $row['hp'] ?>" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">TMT</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tmt" value="<?= $row['tmt'] ?>" required>
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
    $nm_teknisi = $_POST['nm_teknisi'];
    $nik = $_POST['nik'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $tmt = $_POST['tmt'];

    $update = $con->query("UPDATE teknisi SET 
        nm_teknisi = '$nm_teknisi',
        nik = '$nik',
        jk = '$jk',
        alamat = '$alamat',
        hp = '$hp',
        tmt = '$tmt'
        WHERE id_teknisi = '$id'
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