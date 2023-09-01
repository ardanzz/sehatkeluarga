<?php
include '../koneksi.php';
?>

<!-- perintah query untuk menyimpan data ke Tabel Pembelian -->
<?php

// cek query
if ($_GET['act'] == 'insert') {
    $id_barang = $_POST['id_barang'];
    $nama_barang =  $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $stok = $_POST['stok'];
    $jenis_barang = $_POST['jenis_barang'];
    $supplier = $_POST['supplier'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $query = mysqli_query($koneksi, "INSERT INTO beli(id_barang,nama_barang,harga_beli,stok,jenis_barang,supplier,tanggal_masuk) 
                                            VALUES('$id_barang','$nama_barang','$harga_beli','$stok','$jenis_barang','$supplier','$tanggal_masuk')")
        or die('Ada kesalahan pada query insert : ' . mysqli_error($koneksi));
    // jika berhasil tampilkan pesan berhasil simpan data
    if ($query) {
        header("location: pembelian.php");
    }
} elseif ($_GET['act'] == 'delete') {
    if (isset($_GET['id'])) {
        $id_barang = $_GET['id'];

        // perintah query untuk menghapus data pada tabel obat
        $query = mysqli_query($koneksi, "DELETE FROM beli WHERE id_barang='$id_barang'")
            or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

        // cek hasil query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: pembelian.php?alert=terhapus");
        }
    }
}
?>