<!DOCTYPE html>
<html lang="en">
<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/app.min.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/bundles/bootstrap-social/bootstrap-social.css') ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/style.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/components.css') ?>">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/custom.css') ?>">
  <link rel='shortcut icon' type='image/x-icon' href="<?php echo base_url('public/img/favicon.ico') ?>" />
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <?php  

                    errosValidacao();

                    getMsg('msgCadastro');

              ?>
              <div class="card-body">
                <form method="POST" action="<?= base_url('admin/login/cadastrar')?>">
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="frist_name">Name</label>
                      <input id="frist_name" type="text" class="form-control" name="nome" autofocus>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="senha">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="senhaconfirmacao">
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                Already Registered? <a href="<?= base_url('login') ?>">Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- JS Libraies -->
  <script src="<?php echo base_url('public/assets_admin/bundles/jquery-pwstrength/jquery.pwstrength.min.js') ?>"></script>
  <script src="<?php echo base_url('public/assets_admin/bundles/jquery-selectric/jquery.selectric.min.js') ?>"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('public/assets_admin/js/page/auth-register.js') ?>"></script>
  <!-- Template JS File -->
  <!-- General JS Scripts -->
  <script src="<?php echo base_url('public/assets_admin/js/app.min.js') ?>"></script>
  <script src="<?php echo base_url('public/assets_admin/js/scripts.js') ?>"></script>
  <script src="<?php echo base_url('public/assets_admin/js/custom.js') ?>"></script>
</body>


<!-- auth-register.html  21 Nov 2019 04:05:02 GMT -->
</html>
