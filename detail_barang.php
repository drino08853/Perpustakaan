<?php
$id_barang = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM barang WHERE id_barang='$id_barang'");
$detail = $ambil->fetch_assoc();
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Detail Buku</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="container">
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="col-12">
                                <img src="admin/images/<?php echo $detail['gambar_barang'] ?>" style="height: 300px; width: 571px;" class="product-image" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <h3 class="my-3"><?php echo $detail['nama_barang'] ?></h3>
                            <hr>

                            <form method="POST">
                                <div class="mt-4">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <input type="number" name="jumlah" class="form-control" value="1" min="1">
                                        </div>
                                        <button class="btn btn-primary btn-sm btn-flat" name="beli">
                                            <i class="fas fa-book fa-sm mr-2"></i>
                                            Pinjam
                                        </button>
                                    </div>
                                </div>


                        </div>
                    </div>
                    </form>

                    <?php
                    if (isset($_POST["beli"])) {
                        $jumlah = $_POST["jumlah"];
                        // Create an array to hold jumlah and tanggal_kembali
                        $_SESSION["keranjang"][$id_barang] = $jumlah; // You can keep this if needed


                        echo "<script>alert('Buku telah masuk ke item pinjam');</script>";
                        echo "<script>location = '?page=keranjang';</script>";
                    }
                    ?>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
</div>
</section>
<!-- /.content -->