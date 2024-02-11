<?php
require '../../../app/config.php';
$page = 'musnah';
include_once '../../layout/navhead.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 my-3">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h4 class="mb-0"><i class="fas fa-dumpster-fire me-2"></i>Data Pemusnahan Inventaris</h4>
                </div>
                <div>
                    <a href="tambah" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i> Tambah Data</a>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-body border border-dark-info">

                <?php if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') { ?>
                    <div id="notif" class="alert alert-success d-flex align-items-center" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <div>
                            <b><?= $_SESSION['pesan'] ?></b>
                        </div>
                    </div>
                <?php $_SESSION['pesan'] = '';
                } ?>

                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-hover table-striped dataTable">
                        <thead class="bg-dark-info">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pemusnahan</th>
                                <th>Kode</th>
                                <th>Inventaris</th>
                                <th>Ruangan</th>
                                <th>Kondisi Sebelumnya</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $data = $con->query("SELECT * FROM musnah a LEFT JOIN inventaris b ON a.id_inventaris = b.id_inventaris LEFT JOIN ruangan c ON b.id_ruangan = c.id_ruangan ORDER BY a.id_musnah DESC");
                            while ($row = $data->fetch_array()) {
                            ?>
                                <tr>
                                    <td align="center" width="5%"><?= $no++ ?></td>
                                    <td align="center"><?= tgl($row['tgl_musnah']) ?></td>
                                    <td align="center"><?= $row['kode'] ?></td>
                                    <td><?= $row['nm_inventaris'] ?></td>
                                    <td align="center"><?= $row['nm_ruangan'] ?></td>
                                    <td align="center"><?= $row['kondisi_lama'] ?></td>
                                    <td><?= $row['ket_musnah'] ?></td>
                                    <td align="center" width="8%">
                                        <a href="edit?id=<?= $row[0] ?>" class="btn btn-info btn-xs text-white" title="Edit" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-edit"></i></a>
                                        <a href="hapus?id=<?= $row[0] ?>" class="btn btn-danger btn-xs alert-hapus" title="Hapus" data-bs-toggle="tooltip" data-bs-placement="top"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- row  -->
</div>


<?php
include_once '../../layout/footer.php';
?>