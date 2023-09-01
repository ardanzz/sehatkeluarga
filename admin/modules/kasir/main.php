<?php
include '../koneksi.php';
include '../../index.php';

$query = mysqli_query($koneksi, "select kd_transaksi from transaksi order by id_transaksi desc");

$kodeTransaksi = mysqli_fetch_array($query);
if ($kodeTransaksi) {
    $nilai = substr($kodeTransaksi[0], 1);
    $kode = (int) $nilai;
    $kode = $kode + 1;
    $auto_kode = "T" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $auto_kode = "T001";
}

//no nota otomatis
$data = mysqli_query($koneksi, "select no_nota from transaksi order by no_nota desc");

$kodeNota = mysqli_fetch_array($data);
if ($kodeNota) {
    $nilai = substr($kodeNota[0], 1);
    $kode = (int) $nilai;

    $kode = $kode + 1;
    $autokode = "0" . str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {
    $autokode = "0001";
}
date_default_timezone_set('Asia/Jakarta');
?>

<!-- Header -->
<div class="container">
    <div class="right_col" role="main">
        <form action="beli.php" method="post">
            <div class="page-title">
                <div class="title_left">
                    <h3 style="position: relative; left:10px; top:40px; font-size: 30px"><i class=" fa-solid fa-cash-register fa-lg"></i> Kasir</h3>
                </div>
                <br>
            </div>
            <div class="go">
                <div class="clearfix"></div>
                <div class="col-md-10">
                    <div class="x_panel">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d', time()) ?>">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="no-nota">No Nota</label>
                                    <input type="text" class="form-control" name="no_nota" id="no-nota" value="<?= $autokode ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="id-transaksi">ID Transaksi</label>
                                    <input type="text" class="form-control" name="id_transaksi" id="id-transaksi" value="<?= $auto_kode ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="hidden" name="nama_barang_asli" id="nama_barang">
                                    <select class="form-control" id="id-barang" required></select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="qty">Quantity</label>
                                    <input type="number" class="form-control" min="1" name="qty" id="qty" required>
                                </div>
                            </div>
                            <input type="hidden" id="harga">
                            <input type="hidden" id="idbrg">
                            <input type="hidden" name="no" id="no" value="1">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <br>
                                    <a href="#" class="btn btn-primary" id="tambah">Tambah</a>
                                </div>
                            </div>
                        </div>
                        <div style="padding-top: 10px;">
                            <div class="col-md-8">
                                <div id="list">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <span>Nama Barang</span>
                                        </div>
                                        <div class="col-md-2">
                                            <span>Harga</span>
                                        </div>
                                        <div class="col-md-2">
                                            <span>QTY</span>
                                        </div>
                                        <div class="col-md-3">
                                            <span>Subtotal</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 offset-md-10">
                                <div class="row">
                                    <span>Total</span>
                                    <input type="text" id="stotal" name="total" class="form-control" value="0" readonly>
                                </div>
                                <br>
                                <div class="row">
                                    <span>Bayar</span>
                                    <input type="text" id="bayar" name="bayar" class="form-control" required>
                                </div>
                                <br>
                                <div class="row">
                                    <span>Kembalian</span>
                                    <input type="text" name="kembalian" id="kembalian" value="0" class="form-control" readonly>
                                </div>
                                <br>
                                <button type="submit" name="simpan" class="btn btn-default"> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#id-barang').select2();
                    });
                </script>