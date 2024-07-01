<?php
define('SITE_KEY', '6Lec2KYpAAAAAJQjZHyCHuihToYfjnZpEXOXGlfb');
define('SECRET_KEY', '6Lec2KYpAAAAAFsaf1htoNZWKJ6OPV8sQlG8PUh-');
?>
<script src="https://www.google.com/recaptcha/api.js?render=6Lec2KYpAAAAAJQjZHyCHuihToYfjnZpEXOXGlfb"></script>
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
        background-image: url("<?php echo base_url('assets') . '/dist/img/2271.jpg'; ?>");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
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

    label {
        margin: 0;
        padding: 0;
    }



    .content {
        width: 408px;
        border: 1px #ccc solid;
        padding: 15px;
        margin: auto;
        height: 200px;
    }

    .rating {
        border: none;
        float: left;
    }

    .rating>input {
        display: none;
    }

    .rating>label::before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating>label {
        color: #ddd;
        float: right;
    }

    .rating>input:checked~label,
    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #f7d106;
    }

    .rating>input:checked+label:hover,
    .rating>input:checked~label:hover,
    .rating>label:hover~input:checked~label,
    .rating>input:checked~label:hover~label {
        color: #fce873;
    }

    h4 {
        font-weight: normal;
        margin-top: 40px;
        margin-bottom: 0px;
    }

    #hasil {
        font-size: 20px;
    }

    #star {
        float: left;
        padding-right: 20px;
    }

    #star span {
        padding: 3px;
        font-size: 20px;
    }

    .on {
        color: #f7d106
    }

    .off {
        color: #ddd;
    }
</style>

<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-default shadow-none">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>RATING BOOTH</b></a>
            </div>

            <div class="card-body">
                <center>
                    <?php
                    for ($i = 0; $i < floor($rating); $i++) {
                        echo '<span class="on"><i class="fa fa-3x fa-star"></i></span>';
                    }

                    for ($i = 5; $i > floor($rating); $i--) {
                        echo '<span class="off"><i class="fa fa-3x fa-star"></i></span>';
                    }
                    ?>

                </center>
            </div>
            <div class="card-footer">
                <center>Doorprize - Kukar Idaman &copy; 2024</center>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
    <script>
        $('#LoginForm').submit(function(event) {
            event.preventDefault();
            var txtnama = $('#txtnama').val();

            grecaptcha.ready(function() {
                grecaptcha.execute('6LeXAZIUAAAAAMC_zfUBWij74OUSjEi8Q3rdJFhl', {
                    action: 'cek_daftar'
                }).then(function(token) {
                    $('#LoginForm').prepend('<input type="hidden" name="token" value="' + token + '">');
                    $('#LoginForm').prepend('<input type="hidden" name="action" value="cek_login_user">');
                    $('#LoginForm').unbind('submit').submit();
                });;
            });
        });
    </script>
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
        $(function() {
            toastr["info"]("Welcome!");
        });
    </script>
</body>

</html>