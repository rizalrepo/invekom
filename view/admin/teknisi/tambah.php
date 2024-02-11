<?php
require '../../../app/config.php';
$page = 'teknisi';
include_once '../../layout/navhead.php';

$cek_result = $con->query("SELECT max(kd_teknisi) AS kode FROM teknisi");

if ($cek_result) {
    $cek = $cek_result->fetch_array();

    if ($cek['kode'] !== null) {
        $nourut = (int) substr($cek['kode'], 4, 5);
        $nourut++;
    } else {
        $nourut = 1;
    }

    $a = "TKJ-";
    $kode = $a . sprintf('%05s', $nourut);
} else {
    echo "Error executing query: " . $con->error;
}

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
                    <h4 class="mb-0"><i class="fas fa-id-badge me-2"></i>Tambah Data Teknisi</h4>
                </div>
                <div>
                    <a href="index" class="btn btn-sm btn-dark"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-body border border-dark-info mb-5">
                <form class="form-horizontal needs-validation" novalidate method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Kode Teknisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control bg-light" value="<?= $kode ?>" readonly>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nm_teknisi" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Nomor Induk KTP</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="nik" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <?= form_dropdown('jk', $jk2, '', 'class="form-control" required') ?>
                            <div class="invalid-feedback">Kolom harus di pilih !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea name="alamat" class="form-control" required></textarea>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="hp" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label class="col-sm-2 col-form-label">TMT</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="tmt" required>
                            <div class="invalid-feedback">Kolom tidak boleh kosong !</div>
                        </div>
                    </div>
                    <div class="form-group row mt-4 text-end">
                        <div class="col-sm-12">
                            <button type="reset" class="btn btn-sm btn-danger float-right mr-2"><i class="fa fa-times-circle"></i> Batal</button>
                            <button type="submit" name="submit" class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan</button>
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

    $tambah = $con->query("INSERT INTO teknisi VALUES (
        default, 
        '$kode', 
        '$nm_teknisi', 
        '$nik', 
        '$jk',
        '$alamat',
        '$hp',
        '$tmt'
    )");

    if ($tambah) {
        $_SESSION['pesan'] = "Data Berhasil di Simpan";
        echo "<meta http-equiv='refresh' content='0; url=index'>";
    } else {
        echo "Data anda gagal disimpan. Ulangi sekali lagi";
        echo "<meta http-equiv='refresh' content='0; url=tambah'>";
    }
}

?>