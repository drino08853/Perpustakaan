<!-- Modal Detail-->
<?php
// $id_kategori = $_GET['id_kategori'];
$data = mysqli_query($koneksi, "SELECT * FROM pembayaran JOIN pelanggan ON pembayaran.id_pelanggan=pelanggan.id_pelanggan");
while ($d = mysqli_fetch_array($data)) {
?>
    <div class="modal fade" id="detailmodal<?= $d['id_pembayaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 60%;" role="document">
            <div class="modal-content">
                <div class="card-header">
                    <strong>Detail</strong> Pinjam Buku
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fa fa-book"></i> Sufee Library
                                    <small class="float-right">Tgl.Pinjam: <?= date('d-m-Y', strtotime($d['tanggal_pembelian'])); ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From.Anggota
                                <address>
                                    <strong><?= $d['nama_lengkap']; ?></strong><br>
                                    Telp: <?= $d['telp']; ?><br>
                                    User ID: <?= $d['username']; ?>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Judul Buku</th>
                                            <th>Jumlah Pinjam</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $detail = mysqli_query($koneksi, "SELECT * FROM detail_barang JOIN barang ON 
                                        detail_barang.id_barang=barang.id_barang WHERE detail_barang.id_pembayaran='$d[id_pembayaran]'");
                                        while ($dt = mysqli_fetch_array($detail)) {
                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $dt['nama_barang']; ?></td>
                                                <td><?= $dt['jumlah']; ?></td>
                                                <td><?= $dt['tanggal_kembali']; ?></td>
                                                <td>
                                                    <?php
                                                    if ($dt['status'] == 'Sedang Di Pinjam') {
                                                        echo '<span class="badge badge-warning">Sedang Di Pinjam</span>';
                                                    } else {
                                                        echo '<span class="badge badge-success">Sudah Di Kembalikan</span>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-6">
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Total Pinjam :</th>
                                            <th><?= $d['total_pembelian']; ?> Items</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- this row will not appear when printing -->
                    </div>
                    <!-- /.invoice -->
                </div>
                <!-- /.row -->
                <div class="card-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<!-- Modal Edit Peminjaman-->
<?php
// $id_kategori = $_GET['id_kategori'];
$data = mysqli_query($koneksi, "SELECT * FROM pembayaran JOIN pelanggan ON pembayaran.id_pelanggan=pelanggan.id_pelanggan");
while ($d = mysqli_fetch_array($data)) {
?>
    <div class="modal fade" id="editmodal<?= $d['id_pembayaran']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 67%;" role="document">
            <div class="modal-content">
                <div class="card-header">
                    <strong>Edit Detail</strong> Pinjam Buku
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fa fa-book"></i> Sufee Library
                                    <small class="float-right">Tgl.Pinjam: <?= date('d-m-Y', strtotime($d['tanggal_pembelian'])); ?></small>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From.Anggota
                                <address>
                                    <strong><?= $d['nama_lengkap']; ?></strong><br>
                                    Telp: <?= $d['telp']; ?><br>
                                    User ID: <?= $d['username']; ?>
                                </address>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <form method="POST">
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Judul Buku</th>
                                                <th>Jumlah Pinjam</th>
                                                <th>Tanggal Pengembalian</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            $detail = mysqli_query($koneksi, "SELECT * FROM detail_barang JOIN barang ON detail_barang.id_barang=barang.id_barang WHERE detail_barang.id_pembayaran='$d[id_pembayaran]'");
                                            while ($dt = mysqli_fetch_array($detail)) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $dt['nama_barang']; ?></td>
                                                    <td><?= $dt['jumlah']; ?></td>
                                                    <td><?= $dt['tanggal_kembali']; ?></td>
                                                    <td>
                                                        <select data-placeholder="Silahkan Pilih..." class="standardSelect" name="status[]" tabindex="1">
                                                            <option value=""></option>
                                                            <option value="Sedang Di Pinjam" <?php if ($dt['status'] == 'Sedang Di Pinjam') echo 'selected'; ?>>Sedang Di Pinjam</option>
                                                            <option value="Sudah Di Kembalikan" <?php if ($dt['status'] == 'Sudah Di Kembalikan') echo 'selected'; ?>>Sudah Di Kembalikan</option>
                                                        </select>
                                                    </td>
                                                    <input type="hidden" name="id_detail[]" value="<?= $dt['id_detail']; ?>">
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Total Pinjam :</th>
                                                <th><?= $d['total_pembelian']; ?> Items</th>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <!-- this row will not appear when printing -->
                    </div>
                    <!-- /.invoice -->
                </div>
                <!-- /.row -->
                <div class="card-footer">
                    <button type="submit" name="update" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Update Status
                    </button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                        <i class="fa fa-ban"></i> Kembali
                    </button>
                </div>
            </div>
        </div>
    </div>
    </form>
<?php } ?>

<?php
if (isset($_POST['update'])) {
    // Get the posted arrays
    $id_details = $_POST['id_detail'];
    $statuses = $_POST['status'];

    // Loop through the arrays to update each record
    for ($i = 0; $i < count($id_details); $i++) {
        $id = $id_details[$i];
        $status = $statuses[$i];

        // Only update if status is not empty
        if (!empty($status)) {
            $query = "UPDATE detail_barang SET status='$status' WHERE id_detail='$id'";
            mysqli_query($koneksi, $query);
        }
    }

    // Set session for success notification
    $_SESSION['update_success'] = 'Status Pinjam Berhasil Di Update !';

    // Redirect to the same page to display SweetAlert and avoid form resubmission on refresh
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Status Pinjam Berhasil Di Update !',
            showConfirmButton: false,
            timer: 1500
        }).then(function() {
            window.location.href = '?page=pembelian/index'; 
        });
    </script>";
    exit(); // Prevent further script execution
}
?>


<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Peminjaman</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="index.php">Dashboard</a></li>
                    <li><a href="#">Peminjaman</a></li>
                    <li class="active">Data Peminjaman</li>
                </ol>
            </div>
        </div>
    </div>
</div>


<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">History Peminjaman</strong>
                    </div>

                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Nama Anggota</th>
                                    <th scope="col">No.Telp</th>
                                    <th scope="col">Tanggal Pinjam</th>
                                    <th scope="col">Total Pinjam</th>
                                    <th scope="col">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT * FROM pembayaran JOIN pelanggan ON pembayaran.id_pelanggan=pelanggan.id_pelanggan ORDER BY id_pembayaran DESC");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <th scope="col"><?= $no++; ?></th>
                                        <td><?= $d['username']; ?></td>
                                        <td><?= $d['nama_lengkap']; ?></td>
                                        <td><?= $d['telp']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($d['tanggal_pembelian'])); ?></td>
                                        <td><?= $d['total_pembelian']; ?></td>
                                        <td>
                                            <a class="btn btn-outline-success btn-xs" data-toggle="modal" href="#detailmodal<?= $d['id_pembayaran']; ?>"> <i class="fa fa-eye"></i></a>
                                            <a class="btn btn-outline-primary btn-xs" data-toggle="modal" href="#editmodal<?= $d['id_pembayaran']; ?>"> <i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->