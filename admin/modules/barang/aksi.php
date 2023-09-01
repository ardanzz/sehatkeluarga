<?php
include '../koneksi.php';
?>

<!-- perintah query untuk menyimpan data ke tabel obat -->
<?php

// cek query
if ($_GET['act'] == 'insert') {
    $id_barang = $_POST['id_barang'];
    $nama_barang =  $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jualsatuan = $_POST['harga_jualsatuan'];
    $stok = $_POST['stok'];
    $jenis_barang = $_POST['jenis_barang'];
    $query = mysqli_query($koneksi, "INSERT INTO barang(id_barang,nama_barang,harga_beli,harga_jualsatuan,stok,jenis_barang) 
                                            VALUES('$id_barang','$nama_barang','$harga_beli','$harga_jualsatuan','$stok','$jenis_barang')")
        or die('Ada kesalahan pada query insert : ' . mysqli_error($koneksi));
    // jika berhasil tampilkan pesan berhasil simpan data
    if ($query) {
        header("location: tablebarang.php");
    }
} elseif ($_GET['act'] == 'update') {
    if (isset($_POST['simpan'])) {
        if (isset($_POST['id_barang'])) {
            // ambil data hasil submit dari form
            $id_barang  = mysqli_real_escape_string($koneksi, trim($_POST['id_barang']));
            $nama_barang  = mysqli_real_escape_string($koneksi, trim($_POST['nama_barang']));
            $harga_beli = str_replace('.', '', mysqli_real_escape_string($koneksi, trim($_POST['harga_beli'])));
            $harga_jualsatuan = str_replace('.', '', mysqli_real_escape_string($koneksi, trim($_POST['harga_jualsatuan'])));
            $jenis_barang     = mysqli_real_escape_string($koneksi, trim($_POST['jenis_barang']));

            // perintah query untuk mengubah data pada tabel obat
            $query = mysqli_query($koneksi, "UPDATE barang SET
nama_barang= '$nama_barang',
harga_beli= '$harga_beli',
harga_jualsatuan= '$harga_jualsatuan',
jenis_barang= '$jenis_barang'
WHERE id_barang= '$id_barang'")
                or die('Ada kesalahan pada query update : ' . mysqli_error($koneksi));

            if ($query) {
                // jika berhasil tampilkan pesan berhasil update data
                header("location: tablebarang.php");
            }
        }
    }
} elseif ($_GET['act'] == 'delete') {
    if (isset($_GET['id'])) {
        $id_barang = $_GET['id'];

        // perintah query untuk menghapus data pada tabel obat
        $query = mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang='$id_barang'")
            or die('Ada kesalahan pada query delete : ' . mysqli_error($mysqli));

        // cek hasil query
        if ($query) {
            // jika berhasil tampilkan pesan berhasil delete data
            header("location: tablebarang.php?alert=terhapus");
        }
    }
}
?>