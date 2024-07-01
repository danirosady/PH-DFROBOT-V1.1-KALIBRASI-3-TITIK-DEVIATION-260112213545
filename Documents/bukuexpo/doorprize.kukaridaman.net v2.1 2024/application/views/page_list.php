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

    .card {
        background-color: rgba(255,255,255,0.92);
        backdrop-filter: blur(8px);
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

    .table td {
        padding: .3rem .6rem .3rem .6rem;
        vertical-align: middle;
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
                <a href="#" class="h2">PENDAFTAR<b> DOORPRIZE</b><small><sup>KukarIdaman.net</sup></small></a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <table id="example2" class="table table-striped table-responsive table-bordered table-sm" style="width:100%;">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>NAMA</th>
                                <th>ALAMAT</th>
                                <th>JALAN</th>
                                <th>KEC</th>
                                <th>KEL</th>
                                <th>NO.DAFTAR</th>
                                <th>KUPON</th>
                                <th>TANGGAL DAFTAR</th>
                                <th>STATUS</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="card-footer">
 <center>Doorprize - Kukar Idaman &copy; 2024</center>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->

      <!-- Modal Update Product-->
      <form>
             <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h5 class="modal-title" id="myModalLabel">Update Pendaftar</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       </div>
                       <div class="modal-body">
                       <p class="pesan"><span class="badge badge-light kupon-dis "></span></p>
                           <div class="form-group">
                               <input type="hidden" name="regist_id" placeholder="ID" readonly>
                           </div>
                           <div class="form-group">
                               <input type="hidden" name="status" placeholder="Status" readonly>
                           </div>
                                                                                 <div class="form-group">
                               <input type="text" name="alasan" class="form-control" placeholder="Alasan diskualifikasi ?">
                           </div>
                                                                                
                       <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success" id="update">Simpan</button>
                       </div>
                                </div>
                </div>
             </div>
         </form>

    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Toastr -->
    <script src="<?= base_url('assets'); ?>/plugins/toastr/toastr.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('assets'); ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets'); ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $(document).ready(function(){
                // Setup datatables
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
      {
          return {
              "iStart": oSettings._iDisplayStart,
              "iEnd": oSettings.fnDisplayEnd(),
              "iLength": oSettings._iDisplayLength,
              "iTotal": oSettings.fnRecordsTotal(),
              "iFilteredTotal": oSettings.fnRecordsDisplay(),
              "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
              "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
          };
      };
 
      var table = $("#example2").dataTable({

        "responsive": true,
        "pageLength": 5,
        "aoColumnDefs": [
        { "bSortable": false, "aTargets": [ 0,2,3,4,5,8,9 ] }, 
        { "bSearchable": false, "aTargets": [ 0,2 ] },
        { "bVisible": false, "aTargets": [ 3,4,5 ] },
        { "sClass": "text-center", "aTargets": [ 0,6,7,8 ] },
    ],
          initComplete: function() {
              var api = this.api();
              $('#example2_filter input')
                  .off('.DT')
                  .on('input.DT', function() {
                      api.search(this.value).draw();
              });
          },
              oLanguage: {
              sProcessing: "loading..."
          },
              processing: true,
              serverSide: true,
              ajax: {"url": "<?php echo base_url().'priv/get_json'?>", "type": "POST"},
                        columns: [
                        {"data": null,
                            "render": function (data, type, row, meta) {
                            return meta.row+meta.settings._iDisplayStart+1;
                        }
                        },
                        {"data": "nama"},
                        {"data": "alamatlengkap"},
                        {"data": "alamat"},
                        {"data": "kecamatan"},
                        {"data": "kelurahan"},
                        {"data": "id"},
                        {
            data: 'code',
            render: function (data, type) {
                if (type === 'display') {
                    let style = 'class="badge badge-light'; 
                    return '<span ' + style + '">' + data + '</span>';
                }
                return data;
                console.log(data);
            }
        },

        

                        {"data": "dis"},
                        {
                            data: 'toggle',
                            render: function (data, type) {
                            if (data[3] !== '')
                            {
                                let alasan = ' ('+data[3]+')';
                            }   else {
                                alasan = '';
                            }

                            if (type === 'display') {
                                let link = '';
                                
                                if (data[2] == '1') {
                                    link = 'checked';
                                    state = 'Aktif';
                                }
                                else if (data[2] == '0') {
                                    link = '';
                                    state = 'Diskualifikasi';
                                    
                                }
                                return '<div class="custom-control custom-switch"><input type="checkbox" ' + link + ' class="custom-control-input edit_record" id="customSwitch' + data[0] + '" data-id="'+ data[0] +'" data-code="'+data[1]+'" data-status="'+data[2]+'"><label class="custom-control-label" for="customSwitch'+data[0]+'">'+ state + alasan +'</label></div>';
                            }
                            return data;
                        }
                        }
                  ],
                        order: [[6, 'desc']],
          rowCallback: function(row, data, iDisplayIndex) {
              var info = this.fnPagingInfo();
              var page = info.iPage;
              var length = info.iLength;
              $('td:eq(0)', row).html();
          }
 
      });
        });

        $('#example2').on('click','.edit_record',function(){
            let idd=$(this).data('id');
            let code=$(this).data('code');
            let status=$(this).data('status');
            
            console.log(idd,code,status);
            let kupon = '<span class="badge badge-light kupon-dis text-red">'+code+'</span>'
            if (status=="1"){
                    pesan = "Anda akan <b>menonaktifkan</b> kupon";
                    alasanph = "Alasan Diskualifikasi?"
            }else{
                    pesan = "Anda akan <b>mengaktifkan</b> kupon";
                    alasanph = "Alasan Aktivasi?"
            }
            $('#ModalUpdate').modal('show');
            $('[name="regist_id"]').val(idd);
            $('[name="status"]').val(status);
            $('.kupon-dis').html(code);
            $('.pesan').html(pesan+kupon);
            $('[name="alasan"]').attr("placeholder", alasanph);
      });
      $('#ModalUpdate').on('hidden.bs.modal', function () {
        $('#example2').DataTable().ajax.reload(null,false);
        });

        $(document).on('click','#update',function(e){
            var formData = {
            regist_id: $('[name="regist_id"]').val(),
            status: $('[name="status"]').val(),
            alasan: $('[name="alasan"]').val(),
            };
            $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>priv/update",
            data: formData,
            dataType: "json",
            encode: true,
            });
            event.preventDefault();
            $('.modal').modal('hide');
        });
    

</script>
</body>

</html>