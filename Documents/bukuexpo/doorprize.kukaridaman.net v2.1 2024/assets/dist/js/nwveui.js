function reset(){
	$('#nik_cek').val('');
	$('#kupon').text('*****');
	$('#kupon').addClass("display-3");
	$('.kotak').addClass("bg-light");
	$('.border-bottom').removeClass("d-none");
	$('#tgl_daftar').html("<span class='far fa-clock m-1'></span>0000-00-00 23:00:00");
 };
$(document).ready(function(){
 $('#nik_cek').keyup(function(){
	if ( $('#nik_cek').val().length == 16 ){
		let dev_url = 'http://127.0.0.1/doorprize.kukaridaman/page/prosesnik'
		let prod_url = '"<?php echo base_url()?>page/prosesnik"'
		let nik = $(this).val();
	  $.ajax({
		   url: prod_url,
		   method: 'post',
		   data: {nik: nik},
		   dataType: 'json',
		   success: function(response){
				var len = response;
				$('#kupon').text('');
				if(len !== null){
					 var code = response.code;
					 var jam = response.jam;
					 var tanggal = response.tanggal;
					 $('#kupon').text(code);
					 $('#kupon').addClass("display-3");
					$('.border-bottom').removeClass("d-none");
					$('#tgl_daftar').html("<span class='far fa-clock m-1'></span>"+tanggal+" "+jam);
					$('.kotak').addClass("bg-light").removeClass("bg-danger");
				} else {
					$('#kupon').text("TIDAK TERDAFTAR");
					$('.kotak').removeClass("bg-light").addClass("bg-danger");
					$('#kupon').removeClass("display-3");
					$('.border-bottom').addClass("d-none");
				}
				console.log(response);
		   }
	  });
	}
 });
});
