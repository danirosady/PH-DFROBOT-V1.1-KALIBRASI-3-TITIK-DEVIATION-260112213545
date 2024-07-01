<?php
define('SITE_KEY', '6LeXAZIUAAAAAMC_zfUBWij74OUSjEi8Q3rdJFhl');
define('SECRET_KEY', '6LeXAZIUAAAAAJIATj6gPmm5BoIK0XrE2JYqTCl4');
?>
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
    <script src="https://www.google.com/recaptcha/api.js?render=6LeXAZIUAAAAAMC_zfUBWij74OUSjEi8Q3rdJFhl"></script>
</head>


<body class="hold-transition">
    
    
    
    <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
          <div class="col">
          <div class="card shadow-sm">
            <a href="https://online.flippingbook.com/view/942649655/" class="fbo-embed" data-fbo-id="1fba00a7aa" data-fbo-ratio="3:2" data-fbo-lightbox="yes" data-fbo-width="100%" data-fbo-height="auto" data-fbo-version="1" style="max-width: 100%">RPJMD</a><script async defer src="https://online.flippingbook.com/EmbedScriptUrl.aspx?m=redir&hid=942649655"></script>
            <div class="card-body">
              <p class="card-text">RPJMD KUTAI KARTANEGARA 2021 - 2026</p>
              
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <a href="https://online.flippingbook.com/view/101791093/" class="fbo-embed" data-fbo-id="b7b1d10bbe" data-fbo-ratio="3:2" data-fbo-lightbox="yes" data-fbo-width="100%" data-fbo-height="auto" data-fbo-version="1" style="max-width: 100%">Buku_Masterplan_Smartcity_compressed</a><script async defer src="https://online.flippingbook.com/EmbedScriptUrl.aspx?m=redir&hid=101791093"></script>
            <div class="card-body">
              <p class="card-text">MASTERPLAN SMARTCITY KAWASAN IKN 2022 - 2026</p>
              
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <a href="https://online.flippingbook.com/view/102165635/" class="fbo-embed" data-fbo-id="61074a9d4d" data-fbo-ratio="3:2" data-fbo-lightbox="yes" data-fbo-width="100%" data-fbo-height="auto" data-fbo-version="1" style="max-width: 100%">Branding</a><script async defer src="https://online.flippingbook.com/EmbedScriptUrl.aspx?m=redir&hid=102165635"></script>
            <div class="card-body">
              <p class="card-text">KUKAR ASIA WONDERS SEBAGAI BRANDING KABUPATEN</p>
              
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card shadow-sm">
            <a href="https://online.flippingbook.com/view/102449143/" class="fbo-embed" data-fbo-id="0cdce04d27" data-fbo-ratio="3:2" data-fbo-lightbox="yes" data-fbo-width="100%" data-fbo-height="auto" data-fbo-version="1" style="max-width: 100%">LOBIKU</a><script async defer src="https://online.flippingbook.com/EmbedScriptUrl.aspx?m=redir&hid=102449143"></script>

            <div class="card-body">
              <p class="card-text">LOBIKU SEBAGAI STRATEGI PERCEPATAN SPBE KABUPATEN</p>
              
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6LeXAZIUAAAAAMC_zfUBWij74OUSjEi8Q3rdJFhl', {
                action: 'page/cek_daftar'
            }).then(function(token) {
                $('#LoginForm').prepend('<input type="hidden" name="token" value="' + token + '">');

            });;
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
    <script>
        $(function() {
            toastr["info"]("Welcome!");
        });
    </script>
</body>

</html>