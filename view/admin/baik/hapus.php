<?php
require '../../../app/config.php';
include_once '../../layout/navhead.php';
include_once '../../layout/footer.php';

$id = $_GET['id'];
$data  = $con->query("SELECT * FROM baik WHERE id_baik = '$id'")->fetch_array();
$query = $con->query(" DELETE FROM baik WHERE id_baik = '$id' ");
if ($query) {

    $dt = $con->query("SELECT * FROM rusak WHERE id_rusak = '$data[id_rusak]' ")->fetch_array();
    $con->query("UPDATE inventaris SET kondisi = 'Rusak' WHERE id_inventaris = '$dt[id_inventaris]' ");

    $file = $data['foto_baik'];
    if ($file != null) {
        unlink('../../../storage/baik/' . $file);
    }
    $_SESSION['pesan'] = "Data Berhasil di Hapus";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
}
