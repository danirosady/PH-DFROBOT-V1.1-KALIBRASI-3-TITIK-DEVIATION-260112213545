<script src="https://www.google.com/recaptcha/api.js?render=6LeXAZIUAAAAAMC_zfUBWij74OUSjEi8Q3rdJFhl"></script>
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
    <div class="col-md-10">
        <div class="card card-outline card-default shadow-none">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>GRAFIK KUNJUNGAN</b></a>
            </div>

            <div class="card-body">
                <div class="position-relative mb-4">
                    <canvas id="visitors-chart-kunj" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">

                        <p style="color:#0000FF">26-01-2024</p>
                    </span>

                    <span class="mr-2">

                        <p style="color:#FF0000">27-01-2024</p>
                    </span>
                    <span class="mr-2">

                        <p style="color:#00FF00">28-01-2024</p>
                    </span>
                    <span class="mr-2">

                        <p style="color:#808080">29-01-2024</p>
                    </span>
                    <span class="mr-2">

                        <p style="color:orange">30-01-2024</p>
                    </span>
                    <span class="mr-2">

                        <p style="color:#00FFFF">31-01-2024</p>
                    </span>
                    <span class="mr-2">

                        <p style="color:#000000">01-02-2024</p>
                    </span>
                </div>
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
    <!-- Page specific script -->
    <script src="<?php echo base_url(); ?>/assets/plugins/flot/jquery.flot.js"></script>
    <!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
    <script src="<?php echo base_url(); ?>/assets/plugins/flot/plugins/jquery.flot.resize.js"></script>
    <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
    <script src="<?php echo base_url(); ?>/assets/plugins/flot/plugins/jquery.flot.pie.js"></script>

    <script src="<?php echo base_url(); ?>/assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>/assets/plugins/sparklines/sparkline.js"></script>
    <script>
        /* global Chart:false */

        $(function() {
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true

            // KUNJUNGAN
            var $visitorsChartnon = $('#visitors-chart-kunj')
            // eslint-disable-next-line no-unused-vars
            var visitorsChartnon = new Chart($visitorsChartnon, {
                data: {
                    labels: ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'],
                    datasets: [{
                            type: 'line',
                            data: <?= $A; ?>,
                            backgroundColor: 'transparent',
                            borderColor: '#0000FF',
                            pointBorderColor: '#0000FF',
                            pointBackgroundColor: '#0000FF',
                            fill: false
                            // pointHoverBackgroundColor: '#007bff',
                            // pointHoverBorderColor    : '#007bff'
                        },
                        {
                            type: 'line',
                            data: <?= $B; ?>,
                            backgroundColor: 'tansparent',
                            borderColor: '#FF0000',
                            pointBorderColor: '#FF0000',
                            pointBackgroundColor: '#FF0000',
                            fill: false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        },
                        {
                            type: 'line',
                            data: <?= $C; ?>,
                            backgroundColor: 'tansparent',
                            borderColor: '#00FF00',
                            pointBorderColor: '#00FF00',
                            pointBackgroundColor: '#00FF00',
                            fill: false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        },
                        {
                            type: 'line',
                            data: <?= $D; ?>,
                            backgroundColor: 'tansparent',
                            borderColor: '#808080',
                            pointBorderColor: '#808080',
                            pointBackgroundColor: '#808080',
                            fill: false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        },
                        {
                            type: 'line',
                            data: <?= $E; ?>,
                            backgroundColor: 'tansparent',
                            borderColor: 'orange',
                            pointBorderColor: 'orange',
                            pointBackgroundColor: 'orange',
                            fill: false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        },
                        {
                            type: 'line',
                            data: <?= $F; ?>,
                            backgroundColor: 'tansparent',
                            borderColor: '#00FFFF',
                            pointBorderColor: '#00FFFF',
                            pointBackgroundColor: '#00FFFF',
                            fill: false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        },
                        {
                            type: 'line',
                            data: <?= $G; ?>,
                            backgroundColor: 'tansparent',
                            borderColor: '#000000',
                            pointBorderColor: '#000000',
                            pointBackgroundColor: '#000000',
                            fill: false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: 25
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })


        })


        // lgtm [js/unused-local-variable]
    </script>

</body>

</html>