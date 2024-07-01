<?php
define('SITE_KEY', '6Lec2KYpAAAAAJQjZHyCHuihToYfjnZpEXOXGlfb');
define('SECRET_KEY', '6Lec2KYpAAAAAFsaf1htoNZWKJ6OPV8sQlG8PUh-');
?>
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
<script src="https://www.google.com/recaptcha/api.js?render=6Lec2KYpAAAAAJQjZHyCHuihToYfjnZpEXOXGlfb"></script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
<div class="card card-outline card-default shadow-none">
<div class="card-header text-center">
<a class="h1 text-white">Doorprize</a>
<br>
<a class="h1 text-white">Kukar Idaman</a>
</div>
<div class="card-body">
<p class="text-white">Pengajian dan Buka Puasa Bersama Busu Edi Damansyah - Gus Miftah</p>
<p class="login-box-msg text-white text-bold">Lengkapi data diri Anda</p>
<?php
$csrf = array(
'name' => $this->security->get_csrf_token_name(),
'hash' => $this->security->get_csrf_hash()
);
$attributes = array('class' => 'm-t', 'role' => 'form', 'id' => 'LoginForm');
echo form_open('page/cek_daftar', $attributes);
?>
<?= $this->session->flashdata('info'); ?>
<div class="input-group mb-3">
<input type="hidden" name="secret" value="<?= $secret ?>">
<input type="text" name="txtnama" class="form-control nama" placeholder="Nama Lengkap (Min 3 huruf)" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
<div class="input-group mb-3">
<input type="text" name="nik" maxlength="16" class="form-control nik" placeholder="NIK (16 digit)" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-id-card"></span>
</div>
</div>
</div>
<div class="input-group mb-3"><input type="text" name="alamat" class="form-control" placeholder="Alamat" required></div>
<div class="input-group mb-3"><input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required></div>
<div class="input-group mb-3"><input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" required></div>
<div class="input-group mb-3"><input type="number" name="rt" class="form-control" placeholder="RT (nomor)" required></div>
<div class="input-group mb-3"><input type="text" name="txttelp" class="form-control" placeholder="Nomor WA (08xxxxxxxxx) di HP anda" required>
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-phone"></span>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-12">
<button type="submit" class="btn d-none btn-primary btn-block">Kirim</button>
<a class="btn btn-danger btn-block"><span class="fa fa-times"></span> Pendaftaran ditutup! <span class="fa fa-times"></span></a>
</div>
</div>
</form>
<div class="card-footer text-light mt-2">
<center>Doorprize - Kukar Idaman &copy; 2024</center>
</div>
</div>
<div class="card bg-light mt-2"><a href="<?= base_url(); ?>page/ceknik">Sudah mendaftar ? Cek NIK Anda <b>disini</b></a></div>
</div>
</div>
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<script src="<?= base_url('assets'); ?>/dist/js/qiwcbf.min.js"></script>
</body>
</html>
