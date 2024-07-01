<div class="register-box">
    <div class="card card-outline card-default shadow-none">
		<div class="card-header p-2">
	<center>
                    <img class="rounded" id="sampleImage" src="<?= base_url('assets/dist/img/berkahramadhan_s.jpg'); ?>" width="100%" />
                </center>
</div>
				<div class="card-body">
        <h3 class="cloud text-bold">
                    PENGUNDIAN HADIAH
</h3>
        
            <div class="login-box-msg">
                <?php
                $csrf = array(
                    'name' => $this->security->get_csrf_token_name(),
                    'hash' => $this->security->get_csrf_hash()
                );
                $attributes = array('class' => 'm-t', 'role' => 'form', 'id' => 'LoginForm');
                echo form_open('priv/cek_undi', $attributes);
                ?>
                <div class="form-group">
                    <select name="slchadiah" class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected" value="0">Pilih Hadiah</option>
                        <?= strtoupper($hadiah); ?>
                    </select>
                </div>
                <div class="row">

                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block"><h2 class="text-bold">UNDI</h2></button>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
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
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>
