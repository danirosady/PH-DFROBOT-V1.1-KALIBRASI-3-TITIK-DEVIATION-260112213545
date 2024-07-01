<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Doorprize - Kukar Idaman</title>
<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/kukar.ico">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/style.min.css">
</head>
<style>body{background-image:url("<?php echo base_url('assets') . '/dist/img/bukapuasa2024_pincel_app.png'; ?>")}@media (max-width:800px){body{height:70vh!important}}</style>
<body class="hold-transition register-page">
<h3 class="text-bold text-center mb-4 text-white">Cek NIK Pendaftaran Doorprize</h3>	
<div class="register-box">
<div class="card mb-2">
<div class="input-group">
<div class="input-group-prepend">
<div class="input-group-text">
<span class="fas fa-id-card"></span>
</div>
</div>
<input style="font-size: larger;"type="text" name="nik" maxlength="16" id="nik_cek" class="form-control nik text-bold" placeholder="NIK (16 digit)" required="" oninvalid="this.setCustomValidity('Harus diisi !')" oninput="setCustomValidity('') ">
<div class="input-group-append">
<div class="input-group-text">
<a href="javascript:reset();">
<span class="fa fa-undo"></span>
</a>
</div>
</div>
</div>
</div>
<div class="card card-outline card-default shadow-none">
<div class="card-body">
<div class="kotak bg-light rounded">
<div class="border-bottom"><p id="tgl_daftar" class="m-0 pt-1 "> <span class="far fa-clock m-1"></span>0000-00-00 23:00:00</p></div>
<h1 id="kupon"class=" text-bold rounded pb-2 display-3">*****</h1>
</div>
</div>
</div>
</div>  <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets'); ?>/dist/js/qiwcbf.min.js"></script>
<script src="<?= base_url('assets'); ?>/dist/js/nwveui.min.js"></script>
</body>
</html>
