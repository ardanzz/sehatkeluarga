<?php
function base_url()
{
    return 'http://localhost/PHP/admin/';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>style.css" />

    <!-- Font Awesome -->
    <link href="<?= base_url() ?>fontawesome-free-6.4.2-web/css/all.css" rel=" stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- CSS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Plugin Data Table JS -->
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/datatables.min.js"></script>

    <!-- SELECT2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- <Icon> -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Sehat Keluarga</title>



</head>

<body>
    <div class=" fContainer">
        <nav class="wrapper">
            <div class="headerbg">
                <div class="brand">
                    <div class="fonta-css">
                        <span class="fa-stack fa-1x" style="position: relative; right:5px; top:20px; left:10px;">
                            <i class="fa-solid fa-circle fa-stack-2x" style="color:black"></i>
                            <i class=" fa-solid fa-stethoscope fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="firstname">Toko Sehat Keluarga</div>
                    <div class="lastname">
                        <!-- <p class="satuline">
                        Sehat Keluarga
                    </p> -->
                    </div>
                </div>

                <!-- <div class="fContainer">
        <nav class="wrapper">
            <div class="brand">
                <div class="fonta-css"><i class="fa-solid fa-square-plus"></i></div>
                <div class="firstname">Sehat</div>
                <div class="lastname">Keluarga</div>
            </div> -->
                <ul class="navigation">
                    <li class="aktif">
                        <p><a href="<?= base_url() ?>modules/home/main.php"><i class="fa-solid fa-house fa-lg"></i> Home</a></p>
                    </li>
                    <li class="aktif">
                        <p><a href="<?= base_url() ?>modules/kasir/main.php"><i class="fa-regular fa-money-bill-1 fa-lg"></i> Kasir</a></p>
                    </li>
                    <li class="aktif">
                        <p><a href="<?= base_url() ?>modules/barang/tablebarang.php"><i class="fa-solid fa-box fa-lg"></i> Barang</a></p>
                    </li>
                    <li class="aktif">
                        <p><a href="<?= base_url() ?>modules/barang/pembelian.php"><i class="fa-solid fa-boxes-stacked fa-lg"> </i>
                                Pembelian</a></p>
                    </li>

                </ul>
                <ul class="ket">
                    <li style="color: black;"><i class="fa-solid fa-file"></i> Laporan</li>
                    <li class="description">
                        <p><a href="../home/index.html">Transaksi</a></p>
                    </li>
                    <li class="description">
                        <p><a href="../home/index.html">Pembelian</a></p>
                    </li>
                </ul>
        </nav>
        <span class="target"></span>
        <!-- halaman utama dibawah ini -->