<?php
include '../koneksi.php';
include '../../index.php';
?>
<div class="utama">
    <h1 style="position: relative; left:20px; top:40px; font-size: 30px">
        <i class="fa-solid fa-boxes-stacked fa-lg"></i> Pembelian Barang

        <a class="btn btn-primary" style="position:relative; top:60px; left:65.5%;" title=" Tambah Data" data-toggle="tooltip" href="tambahbeli.php">
            <i class="fa fa-plus"></i> Tambah Data
        </a>
    </h1>

    <!-- Main content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <!-- tampilan tabel obat -->
                        <table class="table table-bordered table-striped table-hover table-responsive" id="pembelian">
                            <!-- tampilan tabel header -->
                            <thead>
                                <tr>
                                    <th class="">No.</th>
                                    <th class="text-center">Kode Obat</th>
                                    <th class="text-center">Nama Obat</th>
                                    <th class="text-center">Harga Beli</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Jenis Obat</th>
                                    <th class="text-center">Supplier</th>
                                    <th class="text-center">Tanggal Pembelian</th>
                                    <th class="text-center">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $data = mysqli_query($koneksi, "select * from beli");

                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['id_barang']; ?></td>
                                        <td><?php echo $d['nama_barang']; ?></td>
                                        <td><?php echo $d['harga_beli']; ?></td>
                                        <td><?php echo $d['stok']; ?></td>
                                        <td><?php echo $d['jenis_barang']; ?></td>
                                        <td><?php echo $d['supplier']; ?></td>
                                        <td><?php echo $d['tanggal_masuk']; ?></td>
                                        <td class="text-center"> <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="aksibeli.php?act=delete&id=<?php echo $d['id_barang']; ?>" onclick="return confirm('Anda yakin ingin menghapus obat <?php echo $d['nama_barang']; ?> ?');">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <script>
                                    $(document).ready(function() {
                                        $('#pembelian').DataTable();
                                    });
                                </script>

                                <script>
                                    <?php
                                    if (isset($_GET['alert'])) {
                                        if ($_GET['alert'] == 'terhapus') { ?>
                                            alert('Selamat Data Berhasil Terhapus');
                                    <?php
                                        }
                                    }
                                    ?>
                                </script>