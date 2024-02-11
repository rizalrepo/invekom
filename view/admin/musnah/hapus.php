<?php
require '../../../app/config.php';
include_once '../../layout/navhead.php';
include_once '../../layout/footer.php';

$id = $_GET['id'];
$data  = $con->query("SELECT * FROM musnah WHERE id_musnah = '$id'")->fetch_array();
$query = $con->query(" DELETE FROM musnah WHERE id_musnah = '$id' ");
if ($query) {
    $con->query("UPDATE inventaris SET kondisi = '$data[kondisi_lama]' WHERE id_inventaris = '$data[id_inventaris]' ");
    $_SESSION['pesan'] = "Data Berhasil di Hapus";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
} else {
    echo "Data anda gagal dihapus. Ulangi sekali lagi";
    echo "<meta http-equiv='refresh' content='0; url=index'>";
}
