<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon.png'); ?>">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/css/jquery.dataTables.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/css/adminlte.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/skins/_all-skins.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/morris.js/morris.css">
    <!-- JavaScript -->
    <script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/adminlte/js/adminlte.js"></script>
    <script src="<?php echo base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url(); ?>assets/morris.js/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/raphael/raphael.min.js"></script>
</head>

<body class="fixed hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo base_url(); ?>" class="logo">
                <span class="logo-mini"><b>H P</b></span>
                <span class="logo-lg"><b>HARGA PANGAN</b></span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                Selamat datang <?php echo $this->session->userdata('nama_petugas'); ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> <span>Beranda</span></a>
                    </li>





                    <?php
                    //jika admin
                    if ($this->session->userdata('level') == 'admin') {
                    ?>
                    <li><a href="<?php echo base_url('petugas/tampil'); ?>"><i class="fa fa-user-circle-o"></i>
                            <span>Petugas
                                Monitoring</span></a></li>
                    <li><a href="<?php echo base_url('pasar/tampil'); ?>"><i class="fa fa-database"></i> <span>Data
                                Pasar</span></a></li>
                    <li><a href="<?php echo base_url('pangan/tampil'); ?>"><i class="fa fa-database"></i> <span>Data
                                Komoditas</span></a></li>
                    <?php
                    }
                    //jika admin atau petugas
                    if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'petugas') {
                    ?>

                    <li><a href="<?php echo base_url('monitoring-makanan-pokok/tampil'); ?>"><i
                                class="fa fa-pencil-square"></i> <span>Monitoring Harga Pangan</span></a></li>

                    <?php
                    }

                    //jika admin atau kasubag
                    if ($this->session->userdata('level') == 'admin' || $this->session->userdata('level') == 'kasubag') {
                    ?>
                    <li><a href="<?php echo base_url('laporan/tampil-makanan-pokok'); ?>"><i
                                class="fa fa-file-pdf-o"></i> <span>Laporan</span></a></li>

                    <?php
                    }
                    ?>

                    <li><a href="<?php echo base_url('grafik'); ?>"><i class="fa fa-line-chart"></i>
                            <span>Grafik</span></a>
                    </li>

                    <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off"></i>
                            <span>Logout</span></a></li>
                </ul>
            </section>
        </aside>