$('.nik').on('input', function (event) { 
	this.value = this.value.replace(/[^0-9]/g, '');
});
$('.nama').on('input', function (event) { 
	this.value = this.value.replace(/[0-9]/g, '');
});
$("input[required], select[required]").attr("oninvalid", "this.setCustomValidity('Harus diisi !')");
$("input[required], select[required]").attr("oninput", "setCustomValidity('')");
$(function() {
	toastr["info"]("Welcome!");
});
