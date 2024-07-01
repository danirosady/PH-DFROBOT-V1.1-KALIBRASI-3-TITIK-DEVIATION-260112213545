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
</head>

<style>
    body {
        background-image: url("<?php echo base_url('assets') . '/dist/img/bukapuasa2024.jpeg'; ?>");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: top;
        background-size: cover;
        background-color: #dddddd;
    }

    .card {
        margin-right: auto;
        margin-left: auto;

        box-shadow: 0 15px 25px rgba(129, 124, 124, 0.2);

        border-radius: 5px;
        backdrop-filter: blur(14px);
        background-color: rgba(255, 255, 255, 0.2);
        padding: 10px;
        text-align: center;
    }
</style>

<body class="hold-transition register-page">
<?php
header("refresh: 10;");
?>
<div class="register-box text-white">
        <div class="card card-outline card-default shadow-none">
            <div class="card-header text-center">
                <div class="card-header mb-2">
                <a href="#" class="h1"><b>REKAP PENDAFTAR</b></a>
                </div>
            </div>
            <div class="card-body">
            <h2>Jumlah Pendaftar Saat Ini :</h2>
            <h1 class="bg-light text-bold p-2 mx-5 rounded"><?php echo $jml; ?></h1>
            </div>
            <div class="card-footer">
            <img width="40%"src="<?= base_url('assets/dist/img/kukaridaman.jpeg'); ?>" />
               
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