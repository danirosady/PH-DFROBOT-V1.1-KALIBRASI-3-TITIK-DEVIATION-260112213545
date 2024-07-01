<script src="https://www.google.com/recaptcha/api.js?render=6Lec2KYpAAAAAFsaf1htoNZWKJ6OPV8sQlG8PUh-"></script>
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
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
</head>
<style>
    body {
        background-image: url("<?php echo base_url('assets') . '/dist/img/bukapuasa2024_pincel_app_mobile_md.jpeg'; ?>");
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: cover;
        background-color: #dddddd;
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
	label {
        font-size: small;
        font-weight: 100;
    }

    .table-responsive {
        display: table;
    }

    .table-bordered {
        border: 2px solid #dee2e6;
        border-radius: 10px;
    }

    thead {
        background-color:rgba(185,5,55,0.9);
        color:#f6f6f6;
        text-align:center;
    }

    .page-link {
        color: #3f3f3f;
    }

    .page-item.active .page-link{
        background-color:#b63c3c;
        border-color:#b63c3c;
    }
</style>

<body class="hold-transition register-page">
    <div class="col-md-10">
        <div class="card card-outline card-default shadow-none">
            <div class="card-header text-center">
                <a href="#" class="h1"><b>DAFTAR PEMENANG</b> DOORPRIZE</a>
            </div>

            <div class="card-body">
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>HADIAH</th>
                                <th>KUPON</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?= $daftar; ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
           <!--     <center>Doorprize - Kukar Idaman &copy; 2024</center>-->
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

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
				"columnDefs": [
				{ className: "text-center text-nowrap text-bold", "targets": [ 0,1 ] }
				],
                "paging": false,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": false,
                "autoWidth": true,
                "responsive": true,

            });
        });
    </script>
</body>

</html>
