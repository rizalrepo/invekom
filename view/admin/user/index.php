<?php
require '../../../app/config.php';
$page = 'user';
include_once '../../layout/navhead.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 my-3">
            <!-- Page header -->
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h4 class="mb-0"><i class="fas fa-user me-2"></i>Data Pengguna</h4>
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
                                <th>Nama Pengguna</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $no = 1;
                            $data = $con->query("SELECT * FROM user ORDER BY id_user DESC");
                            while ($row = $data->fetch_array()) {
                            ?>
                                <tr>
                                    <td align="center" width="5%"><?= $no++ ?></td>
                                    <td><?= $row['nm_user'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td align="center">
                                        <?php
                                        if ($row['level'] == 1) {
                                            echo 'Admin';
                                        } else if ($row['level'] == 2) {
                                            echo 'Pimpinan';
                                        } else if ($row['level'] == 3) {
                                            echo 'Personil';
                                        }
                                        ?>
                                    </td>
                                    <td align="center" width="18%">
                                        <a href="edit?id=<?= $row[0] ?>" class="btn text-white btn-info btn-xs" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                        <?php if ($row['level'] == 1 || $row['level'] == 2) { ?>
                                            <a href="hapus?id=<?= $row[0] ?>" class="btn btn-danger btn-xs alert-hapus" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
                                        <?php } ?>
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