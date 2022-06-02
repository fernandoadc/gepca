<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>LACA - Laboratório de Computação Aplicada</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/app.min.css') ?>">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/style.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css/components.css') ?>">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo base_url('public/css/custom.css') ?>">
  <link rel='shortcut icon' type='image/x-icon' href="<?php echo base_url('public/img/favicon.ico') ?>" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form>
            </li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown"><a href="<?php echo base_url('admin/login/logout') ?>"
              class="nav-link nav-link-lg"><i data-feather="log-out" class="log-out"></i>
            </a>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="<?php echo base_url('public/images/logo1.png') ?>" class="header-logo" /> <span
                class="logo-name">LACA</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
              <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">UI Elements</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="copy"></i><span>Página Inicial</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?= base_url('admin/resume') ?>">Resumo Executivo</a></li>
                <li><a class="nav-link" href="<?= base_url('admin/demaisinformacoes') ?>">Demais Informações</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?= base_url('admin/coordenadores') ?>" class="nav-link"><i data-feather="user-check"></i><span>Novo Membro</span></a>
            </li>
            <li class="menu-header">Pages</li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="user-check"></i><span>Auth</span></a>
              <ul class="dropdown-menu">
                <li><a href="auth-login.html">Login</a></li>
                <li><a href="auth-register.html">Register</a></li>
                <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                <li><a href="auth-reset-password.html">Reset Password</a></li>
                <li><a href="subscribe.html">Subscribe</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="alert-triangle"></i><span>Errors</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="errors-503.html">503</a></li>
                <li><a class="nav-link" href="errors-403.html">403</a></li>
                <li><a class="nav-link" href="errors-404.html">404</a></li>
                <li><a class="nav-link" href="errors-500.html">500</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="anchor"></i><span>Other
                  Pages</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="create-post.html">Create Post</a></li>
                <li><a class="nav-link" href="posts.html">Posts</a></li>
                <li><a class="nav-link" href="profile.html">Profile</a></li>
                <li><a class="nav-link" href="contact.html">Contact</a></li>
                <li><a class="nav-link" href="invoice.html">Invoice</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="chevrons-down"></i><span>Multilevel</span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Menu 1</a></li>
                <li class="dropdown">
                  <a href="#" class="has-dropdown">Menu 2</a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Child Menu 1</a></li>
                    <li class="dropdown">
                      <a href="#" class="has-dropdown">Child Menu 2</a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Child Menu 1</a></li>
                        <li><a href="#">Child Menu 2</a></li>
                      </ul>
                    </li>
                    <li><a href="#"> Child Menu 3</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </aside>
      </div>
      <!-- Main Content -->

      <?php 

        if (isset($view)) {

          $this->load->view($view);

        }

      ?>

      <footer class="main-footer">
        <div class="footer-left">
          <a href="templateshub.net">Laboratório de Computação Aplicada</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url('public/js/app.min.js') ?>"></script>
  <!-- JS Libraies -->
  <script src="<?php echo base_url('public/bundles/apexcharts/apexcharts.min.js') ?>"></script>
  <!-- Page Specific JS File -->
  <script src="<?php echo base_url('public/js/page/index.js') ?>"></script>
  <!-- Template JS File -->
  <script src="<?php echo base_url('public/js/scripts.js') ?>"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url('public/js/custom.js') ?>"></script>
</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>
