<?php
include '../../app/config.php';

$no = 1;

$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

$cektgl1 = isset($tgl1);
$cektgl2 = isset($tgl2);

if ($tgl1 == $cektgl1 && $tgl2 == $cektgl2) {
    $sql = $con->query("SELECT * FROM musnah r LEFT JOIN inventaris a ON r.id_inventaris = a.id_inventaris LEFT JOIN ruangan b ON a.id_ruangan = b.id_ruangan LEFT JOIN kategori c ON a.id_kategori = c.id_kategori WHERE r.tgl_musnah BETWEEN '$tgl1' AND '$tgl2' ORDER BY r.tgl_musnah ASC");

    $label = 'LAPORAN PEMUSNAHAN INVENTARIS <br> Tanggal Pemusnahan : ' . tgl($tgl1) . ' s/d ' . tgl($tgl2);
} else {
    $sql = $con->query("SELECT * FROM musnah r LEFT JOIN inventaris a ON r.id_inventaris = a.id_inventaris LEFT JOIN ruangan b ON a.id_ruangan = b.id_ruangan LEFT JOIN kategori c ON a.id_kategori = c.id_kategori ORDER BY id_musnah DESC");
    $label = 'LAPORAN PEMUSNAHAN INVENTARIS';
}

require_once '../../assets/libs/mpdf/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [380, 215]]);
ob_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pemusnahan Inventaris</title>
</head>

<style>
    th {
        color: white;
    }
</style>

<body>
    <div class="table-responsive">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center">
                    <img src="<?= base_url('assets/images/logo.png') ?>" align="left" height="50">
                    <h1>Gedung Biru Harian Radar Banjarmasin</h1>
                    <h6>Jl. A. Yani No.Km 26, RW.9, Landasan Ulin Tim., Kec. Landasan Ulin, Kota Banjarbaru, Kalimantan Selatan</h6>
                </td>
            </tr>
        </table>
    </div>
    <hr size="2px" color="black">

    <h4 align="center">
        <?= $label ?><br>
    </h4>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" cellpadding="6" width="100%">
                    <thead>
                        <tr bgcolor="#51A0C2" align="center">
                            <th>No</th>
                            <th>Tanggal Pemusnahan</th>
                            <th>Kode</th>
                            <th>Inventaris</th>
                            <th>Satuan</th>
                            <th>Kategori</th>
                            <th>Tanggal Perolehan</th>
                            <th>Kondisi Sebelumnya</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($data = mysqli_fetch_array($sql)) { ?>
                            <tr>
                                <td align="center" width="5%"><?= $no++; ?></td>
                                <td align="center"><?= tgl($data['tgl_musnah']) ?></td>
                                <td align="center"><?= $data['kode'] ?></td>
                                <td><?= $data['nm_inventaris'] ?></td>
                                <td align="center"><?= $data['satuan'] ?></td>
                                <td align="center"><?= $data['nm_kategori'] ?></td>
                                <td align="center"><?= tgl($data['tgl_inventaris']) ?></td>
                                <td align="center"><?= $data['kondisi_lama'] ?></td>
                                <td><?= $data['ket_musnah'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <br>
    <br>

    <br>
    <div class="table-responsive">
        <table border="0" cellspacing="0" cellpadding="0" width="100%">
            <tr>
                <td align="center" width="80%">
                </td>
                <td align="center">
                    <h6>
                        Banjarbaru, <?= tgl(date('Y-m-d')) ?><br>
                        Direktur Harian Radar Banjarmasin
                        <br><br><br><br><br><br><br>
                        <hr style="margin-top: 0; margin-bottom: 0;">
                    </h6>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output();
?>