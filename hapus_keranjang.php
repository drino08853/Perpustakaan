<?php

$id_barang = $_GET["id"];
unset($_SESSION["keranjang"][$id_barang]);

echo "<script>alert('Item peminjaman telah dihapus dari detail pinjam');</script>";
echo "<script>location = '?page=keranjang';</script>";
