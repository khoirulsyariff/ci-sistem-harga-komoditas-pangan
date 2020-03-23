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
  <!-- JavaScript -->
  <script src="<?php echo base_url(); ?>assets/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>assets/adminlte/js/adminlte.js"></script>
  <script src="<?php echo base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>
</head>

<body class="fixed hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <a href="<?php echo base_url(); ?>" class="logo">
      <span class="logo-mini"><b>K</b></span>
      <span class="logo-lg"><b>KETERSEDIAAN</b></span>
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
      <li><a href="<?php echo base_url('beranda'); ?>"><i class="fa fa-home"></i> <span>Beranda</span></a></li>

      <?php
      if($this->session->userdata('level') == 'admin') {
        ?>
        <li><a href="<?php echo base_url('petugas/tampil'); ?>"><i class="fa fa-file-text-o"></i> <span>Petugas Monitoring</span></a></li>
        <li><a href="<?php echo base_url('pasar/tampil'); ?>"><i class="fa fa-file-text-o"></i> <span>Data Pasar</span></a></li>
        <li><a href="<?php echo base_url('pangan/tampil'); ?>"><i class="fa fa-file-text-o"></i> <span>Bahan Makanan Pokok</span></a></li>
        <li><a href="<?php echo base_url('rph/tampil'); ?>"><i class="fa fa-file-text-o"></i> <span>Data RPH</span></a></li>
        <li><a href="<?php echo base_url('jenis-sapi/tampil'); ?>"><i class="fa fa-file-text-o"></i> <span>Data Jenis Sapi</span></a></li>
        <li><a href="<?php echo base_url('uptd/tampil'); ?>"><i class="fa fa-file-text-o"></i> <span>Data UPTD Pertanian</span></a></li>
        <?php
      } else {

      }
      ?>


      <li class="treeview">
        <a href="#monitoring">
          <i class="fa fa-pencil-square-o"></i>
          <span>Monitoring</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url('monitoring-makanan-pokok/tampil'); ?>"><i class="fa fa-pencil-square"></i> <span>Bahan Makanan Pokok</span></a></li>
          <li><a href="<?php echo base_url('monitoring-sapi-potong/tampil'); ?>"><i class="fa fa-pencil-square"></i> <span>Sapi Siap Potong</span></a></li>
          <li><a href="<?php echo base_url('monitoring-pertanian/tampil'); ?>"><i class="fa fa-pencil-square"></i> <span>Pengelolaan Pertanian</span></a></li>
        </ul>
      </li>

      <?php
      if($this->session->userdata('level') == 'admin') {
        ?>
        <li class="treeview">
          <a href="#laporan">
            <i class="fa fa-files-o"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('laporan/tampil-makanan-pokok'); ?>"><i class="fa fa-file-pdf-o"></i> <span>Bahan Makanan Pokok</span></a></li>
            <li><a href="<?php echo base_url('laporan/tampil-sapi-potong'); ?>"><i class="fa fa-file-pdf-o"></i> <span>Sapi Siap Potong</span></a></li>
            <li><a href="<?php echo base_url('laporan/tampil-pertanian'); ?>"><i class="fa fa-file-pdf-o"></i> <span>Pengelolaan Pertanian</span></a></li>
          </ul>
        </li>
        <!--<li><a href="<?php //echo base_url('tes-grafik'); ?>"><i class="fa fa-bar-chart"></i> <span>Tes Grafik</span></a></li>-->
        <?php
      }
      ?>

      <li><a href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
    </ul>
    </section>
    </aside>
