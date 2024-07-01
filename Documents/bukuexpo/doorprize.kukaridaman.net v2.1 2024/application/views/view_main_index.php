<div class="login-box">

    <?php echo $info; ?>

    <div class="card card-info">
        <div class="card-header">
            <center>DOORPRIZE KUKARIDAMAN - LOGIN</center>
        </div>
        <div class="card-body">


            <?php

            $attributes = array('class' => 'm-t', 'role' => 'form', 'id' => 'LoginForm');
            echo form_open('page/cek_login', $attributes);
            ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="txtusername" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" name="txtpassword" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>


            <div class="row">

                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-info btn-sm btn-block"><i class="fas fa-sign-in" aria-hidden="true"></i> Sign In</button>
                </div>

                <!-- /.col -->
            </div>
            </form>

        </div>
    </div>

    <!-- /.login-card-body -->
</div>

<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('assets'); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets'); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets'); ?>/dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('assets'); ?>/plugins/select2/js/select2.full.min.js"></script>
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6Lec2KYpAAAAAJQjZHyCHuihToYfjnZpEXOXGlfb', {
            action: 'page/cek_login'
        }).then(function(token) {
            $('#LoginForm').prepend('<input type="hidden" name="token" value="' + token + '">');

        });;
    });
</script>

</body>

</html>