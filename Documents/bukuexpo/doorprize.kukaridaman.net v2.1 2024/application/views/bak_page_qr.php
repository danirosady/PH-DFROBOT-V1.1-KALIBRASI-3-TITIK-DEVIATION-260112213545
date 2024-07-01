<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diskominfo Kutai Kartanegara</title>
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

    #sampleImage {
        -webkit-animation: sharp 5s;
        /* Chrome, Safari, Opera */
        animation: sharp 5s;
        backdrop-filter: blur(14px);
        background-color: rgba(255, 255, 255, 0.2);
    }

    @-webkit-keyframes sharp {
        from {
            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
        }

        to {
            -webkit-filter: none;
            -moz-filter: none;
            -o-filter: none;
            -ms-filter: none;
            filter: none;
        }
    }

    @keyframes sharp {
        from {
            -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px);
        }

        to {
            -webkit-filter: none;
            -moz-filter: none;
            -o-filter: none;
            -ms-filter: none;
            filter: none;
        }
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
    <div class="container mt-5"><br><br><br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center breaking-news bg-white">
                                <div class="d-flex flex-row flex-grow-1 flex-fill justify-content-center bg-danger py-2 text-white px-1 news"><span class="d-flex align-items-center">&nbsp;KESAN</span></div>
                                    <marquee class="news-scroll" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();"><?php echo $kesan;?>
                                    </marquee>
                                </div>
                            </div>
                        </div>
                    </div>
    </div><br><br>
    <div class="register-box">
        <div class="card card-outline card-default shadow-none">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>SCAN</b> ME</a>
            </div>

            <div class="card-body">
                <center>
                    <b>RATING BOOTH KAMI:</b><br>
                    <?php
                    for ($i = 0; $i < floor($rating); $i++) {
                        echo '<span class="on"><i class="fa fa-3x fa-star"></i></span>';
                    }

                    for ($i = 5; $i > floor($rating); $i--) {
                        echo '<span class="off"><i class="fa fa-3x fa-star"></i></span>';
                    }
                    ?>

                </center><br>
                <center>
                    <img id="sampleImage" src="<?= base_url('assets/dist/qr/qr-code-expo.png'); ?>" width="100%" />
                </center>
            </div>
            <div class="card-footer">
                <center>Diskominfo &copy; 2022</center><br>
                
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
        $(function() {
            toastr["info"]("Welcome!");
        });
    </script>
</body>

</html>