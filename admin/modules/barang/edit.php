<?php
include '../koneksi.php';
include '../../index.php';
?>

<div class="utama">
    <h1 style="position: relative; left:20px; top:40px; font-size: 30px">
        <i class="fa-solid fa-pen-to-square"></i> Edit Barang
        <form action="aksi.php?act=update" method="post">
            <!-- <input type="hidden" name="act" value="insert"> -->
            <?php
            $id_barang = $_GET['id_barang'];
            if (isset($_GET['id_barang'])) {
                // fungsi query untuk menampilkan data dari tabel obat
                $query = mysqli_query($koneksi, "SELECT id_barang,nama_barang,harga_beli,harga_jualsatuan,jenis_barang FROM barang WHERE id_barang='$_GET[id_barang]'")
                    or die('Ada kesalahan pada query tampil Data obat : ' . mysqli_error($koneksi));
                $data  = mysqli_fetch_assoc($query);
            }
            ?>
            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Kode Obat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="id_barang" value="<?php echo $id_barang; ?>" readonly required>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Nama obat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="nama_barang" autocomplete="off" value="<?php echo $data['nama_barang']; ?>" required>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Harga Beli</label>
                <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" class="form-control" id="harga_beli" name="harga_beli" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['harga_beli']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class=" col-sm-1 control-label" style="position:relative; top:10px;">Harga Jual</label>
                <div class=" col-sm-4">
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="text" class="form-control" id="harga_jualsatuan" name="harga_jualsatuan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $data['harga_jualsatuan']; ?>" required>
                    </div>
                </div>
            </div>

            <div class="form-group row pt-4 fs-6">
                <label class="col-sm-1 control-label" style="position:relative; top:10px;">Jenis Obat</label>
                <div class="col-sm-4">
                    <?php echo $data['jenis_barang'] ?>
                    <?= $data['jenis_barang'] ?>
                    <select class="form-select" name="jenis_barang" data-placeholder="-- Pilih --" autocomplete="off" required>
                        <option value=""></option>
                        <option value="Hijau" <?= ($data['jenis_barang'] == "Hijau") ? "selected" : "" ?>>Hijau</option>
                        <option value="Biru" <?= ($data['jenis_barang'] == "Biru") ? "selected" : "" ?>>Biru</option>
                        <option value="Merah" <?= ($data['jenis_barang'] == "Merah") ? "selected" : "" ?>>Merah</option>
                        <option value="Bebas" <?= ($data['jenis_barang'] == "Bebas") ? "selected" : "" ?>>Bebas</option>
                    </select>
                </div>
            </div>

            <div class="form-group pt-4" style="position:relative; left:10%;">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                    <a href="tablebarang.php" class="btn btn-secondary btn-reset">Batal</a>
                </div>
            </div>
        </form>