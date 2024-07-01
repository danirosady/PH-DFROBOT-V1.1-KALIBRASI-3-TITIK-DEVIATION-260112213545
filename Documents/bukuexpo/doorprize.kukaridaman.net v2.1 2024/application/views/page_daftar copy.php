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
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/dist/css/adminlte.min.css">
    <script src="https://www.google.com/recaptcha/api.js?render=6Lec2KYpAAAAAJQjZHyCHuihToYfjnZpEXOXGlfb"></script>
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
    <div class="register-box">
        <div class="card card-outline card-default shadow-none">

            <div class="card-header text-center">
                <a href="#" class="h1 text-white">Doorprize</a>
                <br>
                <a href="#" class="h1 text-white">Kukar Idaman</a>
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
                
                <div class="input-group mb-3">
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            </div>
                
                <div class="input-group mb-3">
                    <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required>
                </div>
                
                <div class="input-group mb-3">
                    <input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" required>
                </div>
                
                <div class="input-group mb-3">
                    <input type="number" name="rt" class="form-control" placeholder="RT (nomor)" required>
                    
                </div>
                
                
                <div class="input-group mb-3">
                    <input type="text" name="txttelp" class="form-control" placeholder="Nomor WA (08xxxxxxxxx) di HP anda" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <!--
                <div class="input-group mb-3">
                    <input type="text" name="txtkesan" class="form-control" placeholder="Kesan dan Pesan (Min 3 karakter)" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-comments"></span>
                        </div>
                    </div>
                </div>
                
                <center><small><b>BERI RATING NILAI BOOTH KAMI</b></small></center>
                <div class="form-group clearfix mb-3">
                    <center>
                        <div class="icheck-danger d-inline">
                            <input type="radio" name="r3" value="1" id="radioSuccess1">
                            <label for="radioSuccess1"><small>1</small>
                            </label>
                        </div>&nbsp;&nbsp;
                        <div class="icheck-warning d-inline">
                            <input type="radio" name="r3" value="2" id="radioSuccess2">
                            <label for="radioSuccess2"><small>2</small>
                            </label>
                        </div>&nbsp;&nbsp;
                        <div class="icheck-success d-inline">
                            <input type="radio" name="r3" value="3"  id="radioSuccess3">
                            <label for="radioSuccess3"><small>3</small>
                            </label>
                        </div>&nbsp;&nbsp;
                        <div class="icheck-info d-inline">
                            <input type="radio" name="r3" value="4" checked id="radioSuccess4">
                            <label for="radioSuccess4"><small>4</small>
                            </label>
                        </div>&nbsp;&nbsp;
                        <div class="icheck-info d-inline">
                            <input type="radio" name="r3" value="5" id="radioSuccess5">
                            <label for="radioSuccess5"><small>5</small>
                            </label>
                        </div>&nbsp;&nbsp;
                    </center>
                    -->
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Kirim</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>
            </div>
            <div class="card-footer">
               <!-- <center>Doorprize - Kukar Idaman &copy; 2024</center> -->
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    

    <!-- jQuery -->
    <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
    <script>
        $('.nik').on('input', function (event) { 
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $('.nama').on('input', function (event) { 
            this.value = this.value.replace(/[0-9]/g, '');
        });
        $("input[required], select[required]").attr("oninvalid", "this.setCustomValidity('Harus diisi !')");
        $("input[required], select[required]").attr("oninput", "setCustomValidity('')");

    </script>
    <script>
        $(function() {
            toastr["info"]("Welcome!");
        });
    </script>
</body>

</html>