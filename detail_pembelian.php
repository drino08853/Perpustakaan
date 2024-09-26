<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pinjam</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pinjam</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <?php
    $ambil = $koneksi->query("SELECT * FROM pembayaran JOIN pelanggan ON pembayaran.id_pelanggan=pelanggan.id_pelanggan WHERE pembayaran.id_pembayaran='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
    ?>
    <div class="container">
        <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fa fa-book"></i> Sufee Library
                        <small class="float-right">Tgl.Pinjam: <?php echo date('d-m-Y', strtotime($detail['tanggal_pembelian'])); ?></small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    Yth.Anggota
                    <address>
                        <strong><?php echo $detail['nama_lengkap']; ?></strong><br>
                        Telp: <?php echo $detail['telp']; ?><br>
                        User ID: <?php echo $detail['username']; ?>
                    </address>
                </div>
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
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1; ?>
                            <?php $ambil = $koneksi->query("SELECT * FROM detail_barang JOIN barang ON detail_barang.id_barang=barang.id_barang WHERE detail_barang.id_pembayaran='$_GET[id]'"); ?>
                            <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $nomor; ?></td>
                                    <td><?php echo $pecah['nama_barang']; ?></td>
                                    <td><?php echo $pecah['jumlah']; ?></td>
                                    <td><?php echo $pecah['tanggal_kembali']; ?></td>
                                    <td><?php echo $pecah['status']; ?></td>
                                </tr>
                                <?php $nomor++; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">

                <div class="col-6">
                </div>

                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Total Pinjam:</th>
                                <th><?php echo ($detail['total_pembelian']); ?> <span>Items</span></th>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>

            <!-- this row will not appear when printing -->
        </div>
        <!-- /.invoice -->
    </div><!-- /.col -->
    <!-- /.row -->

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- /.content-wrapper -->