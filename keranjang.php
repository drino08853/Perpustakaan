<?php
if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Item kosong, Silahkan Kunjungi Website');</script>";
    echo "<script>location = 'index.php';</script>";
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Item Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Item Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pinjam Buku</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Judul Buku</th>
                            <th>Jumlah Pinjam</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $nomor = 1; ?>
                        <?php $totalbelanja = 0; ?>
                        <?php foreach ($_SESSION["keranjang"] as $id_barang => $jumlah): ?>

                            <!-- Menampilkan yang sedang di perulangkan berdasarkan id produk -->
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
                            $pecah = $ambil->fetch_assoc();
                            ?>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $pecah["nama_barang"]; ?></td>
                                <td><?php echo $jumlah; ?></td>
                                <td><a href="?page=hapus_keranjang&id=<?php echo $id_barang ?>" onclick="return confirm('Apakah anda yakin item pinjam akan dihapus!');" class="btn btn-outline-danger"><i class="fa fa-trash"></a></td>
                            </tr>
                            <?php $nomor++; ?>
                            <?php $totalbelanja += $jumlah; ?>
                        <?php endforeach ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Total Pinjam</th>
                            <th><?php echo ($totalbelanja) ?></th>
                        </tr>
                    </tfoot>
                </table>


                <div class="card-header">
                    <a href="?page=home" class="btn btn-primary btn-flat"><i class="fa fa-book"></i> Lanjutkan Pinjam</a>
                    <a href="?page=checkout" class="btn btn-success btn-flat"><i class="fa fa-check-square"></i> Check Out</a>
                </div>


                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </div>
        <!-- /.col -->
    </div>

    <!-- /.row -->

</div>
<!-- /.row -->