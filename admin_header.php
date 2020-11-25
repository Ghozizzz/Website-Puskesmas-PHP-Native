<!DOCTYPE html>
<?php 
include "../koneksi.php";
session_start();
if(empty($_SESSION['user']['id_roles']) || $_SESSION['user']['id_roles']==4){
    header('Location: '.$url.'pages/404.php');
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="<?=$url;?>assets/admin/css/styles.css" rel="stylesheet" />
        <link href="<?=$url;?>assets/admin/css/bootstrap.min.css" rel="stylesheet" />
        <script src="<?=$url;?>assets/admin/js/fa.min.js"></script>
        <!-- SweetAlert -->
        <link rel="stylesheet" href="../assets/plugins/sweetalert2/sweetalert2.min.css">
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Start Bootstrap</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?=$url;?>do/logout.php"><i class="fas fa-user fa-fw"></i>Logout</a>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link" href="<?=$url;?>admin/index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Transaksi Pasien
                            </a>
                            <a class="nav-link" href="<?=$url;?>admin/index_apoteker.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Transaksi Obat
                            </a>
                            <a class="nav-link" href="<?=$url;?>admin/index_trx.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Transaksi Pembayaran
                            </a>
                            <a class="nav-link" href="<?=$url;?>admin/index_selesai.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Transaksi Selesai
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">