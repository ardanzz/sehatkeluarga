<?php
include '../koneksi.php';
include '../../index.php';
?>

<div class="utama">
    <h1 style="position: relative; left:20px; top:40px; font-size: 30px">
        <i class="fa-solid fa-pen-to-square"></i> Input Pembelian Barang

        <?php
        // fungsi untuk membuat id transaksi
        $query_id = mysqli_query($koneksi, "SELECT RIGHT(id_barang,3) as kode FROM beli
        ORDER BY id_barang DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_barang : ' . mysqli_error($koneksi));

        $count = mysqli_num_rows($query_id);

        if ($count <> 0) {
            // mengambil data id_barang
            $data_id = mysqli_fetch_assoc($query_id);
            $kode = $data_id['kode'] + 1;
        } else {
            $kode = 1;
        }

        // buat id_barang
        $buat_id = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $id_barang = "B$buat_id";
        ?>
        <form action="aksibeli.php?act=insert" method="post">
            <!-- <input type="hidden" name="act" value="insert"> -->
            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Kode Obat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="id_barang" value="<?php echo $id_barang; ?>" readonly required>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Nama obat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_barang" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Harga Beli</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required>
                    </div>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Stok</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="stok" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Jenis Obat</label>
                <div class="col-sm-4">
                    <select class="form-select" name="jenis_barang" autocomplete="off" required>
                        <option value=""></option>
                        <option value="Hijau">Hijau</option>
                        <option value="Biru">Biru</option>
                        <option value="Merah">Merah</option>
                        <option value="Bebas">Bebas</option>
                    </select>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Supplier</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="supplier" autocomplete="off" required>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label">Tanggal</label>
                <div class="col-sm-4">
                    <input type="date" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_masuk" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
            </div>

            <div class="form-group pt-4" style="position:relative; left:10%;">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                    <a href="pembelian.php" class="btn btn-secondary btn-reset">Batal</a>
                </div>
            </div>
        </form>