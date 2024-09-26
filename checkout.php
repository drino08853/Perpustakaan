<?php
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan Login');</script>";
    echo "<script>location = '?page=login';</script>";
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Check Out</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Check Out</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <form method="POST">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pinjam Buku</h3>
                    <h3 class="card-title float-right">Tanggal Pinjam : <?= date('d-m-Y') ?></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Juduk Buku</th>
                                <th>Jumlah Pinjam</th>
                                <th>Tanggal Kembali</th>
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
                                    <td><input type="date" name="tanggal_kembali[<?php echo $id_barang; ?>]" class="form-control" style="width: 60%" required></td>
                                </tr>
                                <?php $nomor++; ?>
                                <?php $totalbelanja += $jumlah; ?>
                            <?php endforeach ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total Item Pinjam</th>
                                <th><?php echo ($totalbelanja) ?></th>
                            </tr>
                        </tfoot>
                    </table>



                    <div class="card-header">
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-sm-12 invoice-col">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <input name="nama_lengkap" type="text" class="form-control" readonly value="<?php echo $_SESSION["pelanggan"]['nama_lengkap'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>No.Telp</label>
                                            <input name="telp" type="number" class="form-control" readonly value="<?php echo $_SESSION["pelanggan"]['telp'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>

                    <div class="card-header">
                        <a href="?page=keranjang" class="btn btn-warning btn-flat"><i class="fa fa-backward"></i> Kembali Halaman Item</a>
                        <button name="checkout" class="btn btn-primary btn-flat" onclick="return confirm('Apakah Data Anda Sudah Benar Di Input Atau Belum Lengkap,Kalau Merasa Belum Benar Silahkan Kembali Ke Halaman Item Sebelum Melakukan Proses Pinjam,Karena Setelah Melakukan Proses Pinjam Data Tidak Bisa Di Update Atau Di Ubah !');"><i class="fa fa-book"></i> Proses Pinjam</button>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.row -->
    </form>
    <!-- /.row -->


    <?php
    if (isset($_POST["checkout"])) {
        $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
        $tanggal_pembelian = date("Y-m-d");

        // Insert ke tabel pembayaran
        $koneksi->query("INSERT INTO pembayaran (id_pelanggan, tanggal_pembelian, total_pembelian) 
                     VALUES ('$id_pelanggan', '$tanggal_pembelian', '$totalbelanja')");

        // Mendapatkan ID pembayaran terbaru
        $id_pembelian_barusan = $koneksi->insert_id;

        // Loop untuk menambahkan data detail_barang
        foreach ($_SESSION["keranjang"] as $id_barang => $jumlah) {
            // Ambil data barang dari tabel barang
            $ambil = $koneksi->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
            $perbarang = $ambil->fetch_assoc();

            // Ambil tanggal kembali yang sesuai dari form
            $tanggal_kembali = $_POST['tanggal_kembali'][$id_barang];

            //Status Auto Isi
            $status = 'Sedang Di Pinjam';

            // Insert detail barang dengan batch insert atau query per item
            $koneksi->query("INSERT INTO detail_barang (id_pembayaran, id_barang, jumlah, tanggal_kembali,status) 
                         VALUES ('$id_pembelian_barusan', '$id_barang', '$jumlah', '$tanggal_kembali','$status')");
        }

        // Hapus keranjang setelah checkout
        unset($_SESSION["keranjang"]);

        // Beri notifikasi dan redirect
        echo "<script>alert('Peminjaman sukses');</script>";
        echo "<script>location = '?page=detail_pembelian&id=$id_pembelian_barusan';</script>";
    }
    ?>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>