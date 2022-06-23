<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs –––––––––––––––––––––––––––––––––––––––––––––––––-->
  <meta charset="utf-8">
  <title>Grep.Comp  - Grupo de Estudo e Pesquisa em Computação Aplicada</title>
  <meta name="description" content="Laca - Laboratório de Computação Aplicada">
  <meta name="author" content="Fernando Almeida do Carmo">

  <!-- Mobile Specific Metas ––––––––––––––––––––––––––––––––––––––––––––––––––-->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT ––––––––––––––––––––––––––––––––––––––––––––––––––-->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS ––––––––––––––––––––––––––––––––––––––––––––––––––-->
  <link rel="stylesheet" href="<?php echo base_url('public/css-s/normalize.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css-s/skeleton.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css-s/custom.css') ?>">
  <link rel="stylesheet" href="<?php echo base_url('public/css-s/isg.css') ?>">
  
    <!-- Scripts ––––––––––––––––––––––––––––––––––––––––––––––––––-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
  <script src="js/site.js"></script>

  
  <!-- Favicon ––––––––––––––––––––––––––––––––––––––––––––––––––-->
  <link rel="icon" type="image/png" href="#"> <!-- que aparece na janela -->

</head>
<body class="code-snippets-visible has-docked-nav" cz-shortcut-listen="true">

  <!-- Primary Page Layout––––––––––––––––––––––––––––––––––––––––––––––––––-->
  <div class="container">
    
			<?php

				if (isset($view)) {

					$this->load->view($view); 

				}

			?>

  </div>
  
  <footer>
    <div class="section categories">
      <div class="container">
  Atualização: 06/2022
  </div></div>
  </footer>
  
  <!-- End Document ––––––––––––––––––––––––––––––––––––––––––––––––––-->

  <div class="betternet-wrapper"></div>
</body>
</html>