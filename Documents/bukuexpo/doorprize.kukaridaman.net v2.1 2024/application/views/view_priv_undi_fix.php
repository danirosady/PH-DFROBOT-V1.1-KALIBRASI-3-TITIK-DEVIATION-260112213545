<div class="register-box">
    <div class="card card-outline card-default shadow-none">
        <div class="card-header text-center">
		<a href="<?= base_url('priv/index'); ?>" class="btn btn-secondary float-left"><span class="fa fa-arrow-left"></span></a>
                    
            <a href="#" class="h1 mr-4"><b>PEMENANG UNDIAN</b></a>
        </div>
		<div class="card-header pt-1">
		<a href="#" class="h2"><b>ATAS NAMA :</b></a>
	<div class="bg-danger text-center text-white p-2 m-2 rounded">
			<div class="text-bold card-header p-0 scramble"><?= $pemenang; ?></div>
			<div><?= $alamat." Kel. ".$kelurahan." Kec. ".$kecamatan; ?></div>
		</div>
  <div class="row">
                    <!-- /.col -->
                    <div class="col-6">
					 </div>
                    <!-- /.col -->
                </div>
        </div>
		<div class="card-body">
		             <img class="rounded mb-1" src="<?= base_url('assets/dist/img/prize/'.$foto); ?>" width="250px" />
                     <p class="m-0 p-0"><small>*foto hanya ilustrasi</small></p>
			
                     <a class="h2 rounded bg-secondary btn-block"><b class="text-white"><?= strtoupper($hadiah); ?></b></a> 
            
            </div>


        <div class="card-footer">
            <center>Doorprize - Kukar Idaman &copy; 2024</center>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->

</div>
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= base_url('assets'); ?>/dist/js/descrambler.min.js"></script>
<script>
	if ($('.scramble').html().length < 10){
		$('.scramble').addClass('h1 display-4');
	} else if ($('.scramble').html().length < 20) {
		$('.scramble').addClass('h1');
	} else {
		$('.scramble').addClass('h2');
	}

		$(".scramble").scramble( 0.1, 0.1, 'alphabet', 'uppercase' );
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>
