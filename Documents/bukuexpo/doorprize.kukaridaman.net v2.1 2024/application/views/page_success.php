<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Doorprize - Kukar Idaman</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/dist/img/kukar.ico">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    
<link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/style.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box text-white">
        <div class="card card-outline card-default shadow-none">
            <div class="card-header text-center">
                <div class="card-header mb-2">
                <a href="#" class="h1"><b>BERHASIL</b></a>
                </div>
                <h3> No : <?php
                echo $id;
                ?></h3>
                <h3> Nama : <?php echo $nama ;?> </h3>

            </div>
            <div class="card-body">
            <h2>Kupon Anda</h2>
            <h1 class="bg-light text-bold p-2 mx-5 rounded"><?php echo $code; ?></h1>
            <p class="m-0" id="tgl_daftar"><?php echo $tanggal ." ". $jam;?></p>
               <!--
                <p>
                    Daftarkan nomor WA anda ke Whatsapp Gateway kami, agar sistem kami dapat menghubungi anda secara otomatis.
                </p>
                <a target="blank" class="btn btn-success" href="https://api.whatsapp.com/send?phone=+85253162279&text=Hi">Daftarkan Nomor Ini</a>
                -->
            </div>
            <div class="card-footer">
            <img width="50%"src="<?= base_url('assets/dist/img/kukaridaman.jpeg'); ?>" />
               
            </div>
            <div class="card-footer">
            
               <center>Doorprize - Kukar Idaman &copy; 2024</center>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
</body>

</html>