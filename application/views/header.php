<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/js/bootstrap.min.js');?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <title>Etniq.id</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light border-bottom" style="margin: 0;">
      <a class="navbar-brand" href="<?php echo base_url();?>"><h2>Etniq.id</h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav kiri">
          <form class="cari">
            <div class="row">
              <div class="col">
                <input type="text" class="form-control" placeholder="search . . .">
              </div>
            </div>
          </form>
          <a class="nav-item nav-link" href="#">Help</a>
          <a class="nav-item nav-link mr-2" href="#">Stores</a>
          <form class="cari-l">
            <div class="row">
              <div class="col-12">
                <input type="text" class="form-control" placeholder="search . . .">
              </div>
            </div>
          </form>
        </div>
        <div class="navbar-nav ml-auto">
<?php 
if ($this->session->userdata('status')){?>
          <div class="dropdown">
            <a class="nav-item nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata('nama_pelanggan');?></a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="<?php echo base_url('akun/profil');?>">Profile</a>
              <a class="dropdown-item" href="<?php echo base_url('akun/alamat')?>">Alamat</a>
              <a class="dropdown-item" href="<?php echo base_url('home/logout');?>">Logout</a>
            </div>
          </div>
          <span class="nav-item nav-link cari-l">|</span>
          <a class="nav-item nav-link" href="<?= base_url('pembelian')?>">Riwayat Pembelian</a>
          <a class="nav-item nav-link" href="<?= base_url('pembayaran')?>">Pembayaran</a>
          <a class="nav-item nav-link mr-5" href="<?= base_url('keranjang')?>">Keranjang</a>
        </div>
<?php
}?>
      </div>
    </nav>
  