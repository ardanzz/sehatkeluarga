<?php
include '../koneksi.php';
include '../../index.php';
?>
<div class="utama">
    <h1 style="position: relative; left:20px; top:40px; font-size: 30px">
        <i class="fa-solid fa-box fa-lg"></i> Barang

        <a class="btn btn-primary" style="position:relative; top:60px; left:77%;" title=" Tambah Data" data-toggle="tooltip" href="tambah.php">
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
                        <table class="table table-bordered table-striped table-hover table-responsive" id="tablebarang">
                            <!-- tampilan tabel header -->
                            <thead>
                                <tr>
                                    <th class="">No.</th>
                                    <th class="text-center">Kode Obat</th>
                                    <th class="text-center">Nama Obat</th>
                                    <th class="text-center">Harga Beli</th>
                                    <th class="text-center">Harga Jual</th>
                                    <th class="text-center">Stok</th>
                                    <th class="text-center">Jenis Obat</th>
                                    <th class="text-center" style="width:10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                $data = mysqli_query($koneksi, "select * from barang");

                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['id_barang']; ?></td>
                                        <td><?php echo $d['nama_barang']; ?></td>
                                        <td><?php echo $d['harga_beli']; ?></td>
                                        <td><?php echo $d['harga_jualsatuan']; ?></td>
                                        <td><?php echo $d['stok']; ?></td>
                                        <td><?php echo $d['jenis_barang']; ?></td>
                                        <td class="text-center">
                                            <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' href="edit.php?id_barang=<?php echo $d['id_barang']; ?>" class='btn btn-success btn-sm'>
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="aksi.php?act=delete&id=<?php echo $d['id_barang']; ?>" onclick="return confirm('Anda yakin ingin menghapus obat <?php echo $d['nama_barang']; ?> ?');">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Jquery Plugin Pagination -->
<script>
    $(document).ready(function() {
        $('#tablebarang').DataTable();
    });
</script>

<!-- Alert Hapus Obat -->
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