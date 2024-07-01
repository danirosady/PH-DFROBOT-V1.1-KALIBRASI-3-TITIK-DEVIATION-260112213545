<?php
// ambil kode pengunjung yang belum menang
$query2 = $this->db->query("SELECT code FROM pengunjung WHERE is_pemenang='0' AND status ='1'");
$pengunjung = "";
if ($query2->num_rows() > 0) {
    foreach ($query2->result() as $row2) {
        $pengunjung .= $row2->code . ",";
    }
    $pengunjung = substr($pengunjung, 0, strlen($pengunjung) - 1);
    $is_enable = "";
} else {
    $is_enable = "disabled";
}
?>

<div class="register-box">
    <div class="card card-outline card-default shadow-none">
        <div class="card-header text-center">
            <h1 class="display-2">PENGUNDIAN</h1>    
    </div>
	<div class="card-header">
		             <!-- <img class="rounded mb-3" src="
					 
					 <?= base_url('assets/dist/img/prize/'.$foto); ?>
					 
					 " width="250px" /> -->
       
				<a class="h2 rounded bg-secondary display-4 text-bold btn-block"><b class="text-white"><?= strtoupper($hadiah); ?></b></a> 
				</div>
        <div class="card-body pt-0">
            <div class="login-box-msg">
	
                <?php
                $csrf = array(
                    'name' => $this->security->get_csrf_token_name(),
                    'hash' => $this->security->get_csrf_hash()
                );
                $attributes = array('class' => 'm-t', 'role' => 'form', 'id' => 'LoginForm');
                echo form_open('priv/undi_fix/' . $id_hadiah, $attributes);
                ?>
                <div class="row">
                    <div class="form-group">
						<div class="box-huge my-3">
                        <input class="huge  glow" id="slcidpnt" name="slcidpnt" onload="mulai_undi()" class="form-control textshadow blurry-text" value="SIAP ?" readonly /><br>
                        </div>
						<div class="btn-group">
                            <input type="hidden" id="calon_pemenang" value="<?php echo $pengunjung; ?>" size="100%" readonly />

							<div class="row">
		                    <div class="col-3">
                            <button id="buttonstart" onclick="start_timer()" class="btn btn-lg btn-default">
							<span class="spinner-border spinner-border-lg d-none mb-1" role="status" aria-hidden="true"></span>
 							<span class="sr-only">Loading...</span><span class="fa fa-play"></span> MULAI</button>
							</div>

							<div class="col-3">
							<button id="buttonstop" onclick="stop_timer()" class="btn btn-default btn-lg px-0" disabled="true"><span class="fa fa-stop"></span> BERHENTI</button>
							</div>

							<div class="col-3">
                        <button disabled type="submit" class="btn btn-success mt-1 text-bold" <?= $is_enable; ?>><span class="fa fa-check"></span>TETAPKAN</button>
                    </div>

					<div class="col-3">
                        <a href="<?php echo base_url('priv/index');?>" class="btn btn-danger mt-1 pt-2 text-bold"><span class="fa fa-times"></span> BATALKAN</a>
                    </div>

						</div>
                    </div>
                </div>
    
        </div>
        </div><!-- /.card -->
            <div class="card-footer">
            <center>Doorprize - Kukar Idaman &copy; 2024</center>
        </div>
        <script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })
            })
            function start_timer() {
                refreshIntervalId = window.setInterval(function() {
                    mulai_undi()
                }, 10);
                $("#buttonstart").prop("disabled", true);
        		$("#buttonstop").prop("disabled", false);
        		$(".spinner-border").removeClass("d-none");
        		$(".fa-play").addClass("d-none");
        		$(".box-huge").addClass("box");
            }
            function stop_timer() {
                window.clearInterval(refreshIntervalId);
                $('#buttonstop').prop('disabled', true);
                $('.btn-light').addClass('btn-success').removeClass('btn-light');
                $('.btn-success').prop('disabled', false);
				$(".spinner-border").addClass("d-none");
        		$(".fa-play").removeClass("d-none");
				$(".box-huge").removeClass("box");
            }
            function mulai_undi() {
				var calonPemenang = $('#calon_pemenang').val();
    			var items = calonPemenang.split(",");

                function rand(min, max) {
                    var offset = min;
                    var range = (max - min) + 1;
                    var randomNumber = Math.floor(Math.random() * range) + offset;
                    return randomNumber;
                }
                randomNumber = rand(0, items.length - 1);
                $("#slcidpnt").val(items[randomNumber]);
            }
        </script>
