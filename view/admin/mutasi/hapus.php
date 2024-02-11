<?php
require '../../../app/config.php';
include_once '../../layout/navhead.php';
include_once '../../layout/footer.php';

$id = $_GET['id'];
$data  = $con->query("SELECT * FROM mutasi WHERE id_mutasi = '$id'")->fetch_array();
$query = $con->query(" DELETE FROM mutasi WHERE id_mutasi = '$id' ");
if ($query) {
    $con->query("UPDATE inventaris SET id_ruangan = '$data[id_ruangan_lama]' WHERE id_inventaris = '$data[id_inventaris]' ");
    $_SESSION['pesan'] = "Data Berhasil di Hapus";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
}
