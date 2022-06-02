<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Dashboard</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 \public\dist\bootstrap\dist\css-->

  <link rel="stylesheet" href="<?php echo base_url('public/dist/bootstrap/css/bootstrap.min.css') ?>" > 

  <!-- Font Awesome -->

  <link rel="stylesheet" href="<?php echo base_url('public/dist/font-awesome/css/font-awesome.min.css')?>">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Ionicons  public\dist\font-awesome\css-->

  <link rel="stylesheet" href="<?php echo base_url('public/dist/Ionicons/css/ionicons.min.css')?>">

  <!-- Theme style -->

  <link rel="stylesheet" href="<?php echo base_url('public/css/AdminLTE.min.css')?>">

  <!-- AdminLTE Skins. Choose a skin from the css/skins

       folder instead of downloading all of them to reduce the load. -->

       <link rel="stylesheet" href="<?php echo base_url('public/css/skin-blue.min.css')?>">



       <link rel="stylesheet" href="<?php echo base_url('public/css/admin-loja.css')?>">

<!-- DataTables -->

       <link rel="stylesheet" href="<?php echo base_url('public/dist/data-tables/datatables.css')?>">



        <link rel="stylesheet" href="<?php echo base_url('public/dist/jqueryuploadfile/css/uploadfile.css')?>">

  

  <!-- Google Font -->

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script type="text/javascript">

	 	var url_loja = "<?= base_url() ?>";

	 </script>

</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">



  <header class="main-header">

    <!-- Logo -->

    <a href="<?= base_url('/  ') ?>" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>CT</b>DA</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>CTDA</b>2019</span>

    </a>

    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">

        <span class="sr-only">Toggle navigation</span>

      </a>



      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          

          <li>

            <a href="<?php echo base_url()?>"> <i class="fa fa-leaf"></i> Sair</a>

          </li>

        </ul>

      </div>

    </nav>

  </header>

 

  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <section class="sidebar">

     

     

      <!-- sidebar menu: : style can be found in sidebar.less  -->

      <ul class="sidebar-menu" data-widget="tree">

        <li class="header">Navegação</li>

        <li>

          <a href="<?= base_url('admin') ?>"> <i class="fa fa-leaf"></i><span> dashboard </span>

        	 <span class="pull-right-container">

           </span>

        	</a>

        </li>

        <li><a href="<?= base_url('admin/inscricao') ?>" title="Inscrição"><i class="fa fa-gift"></i>Inscrições</a></li>

       

        <li><a href="<?= base_url('admin/submissoes') ?>" title="Trabalhos Submetidos"><i class="fa fa-gift"></i>Trabalhos Submetidos</a></li>

        <li><a href="<?= base_url('admin/minicursos') ?>" title="Minicursos e Palestras"><i class="fa fa-gift"></i>Minicursos e Palestras</a></li>

         <li><a href="<?= base_url('admin/faturamento') ?>" title="Faturamento"><i class="fa fa-gift"></i>Faturamento</a></li>

        

      </ul>

    </section>

    <!-- /.sidebar -->

  </aside>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">

    <?php 

    if (isset($view)) {

    	$this->load->view($view);

    }


     ?>

  </div>

  <!-- /.content-wrapper -->

  <footer class="main-footer">

    <div class="pull-right hidden-xs">

      <b>Version</b> 1.0.0

    </div>

    <strong>Copyright &copy; 2018 <a href="#">devs</a>.</strong> All rights

    reserved.

  </footer>



</div>

<!-- ./wrapper -->

<!-- jquery-localhost -->

<script src="<?php echo base_url('public/js/jquery-3.3.1.min.js')?>"></script>



<!-- jQuery 3 link do site funcionando  https://code.jquery.com/jquery-3.3.1.min.js-->



<script src="https://code.jquery.com/jquery-3.3.1.min.js" type="text/javascript"></script> 

<!--script src="http://malsup.github.io/jquery.form.js" type="text/javascript"></script> -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<!--<script>   $.widget.bridge('uibutton', $.ui.button); </script> -->

<!-- Bootstrap 3.3.7 -->

<script src="<?php echo base_url('public/dist/bootstrap/js/bootstrap.min.js')?>"></script>

<!-- Slimscroll  USADO jquery-slimscroll-->

<script src="<?php echo base_url('public/dist/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>

<!-- FastClick USADO public\dist\fastclick\lib -->

<script src="<?php echo base_url('public/dist/fastclick/lib/fastclick.js')?>"></script>

<!-- AdminLTE App -->

<script src="<?php echo base_url('public/js/adminlte.min.js')?>"></script>

<!-- AdminLTE dashboard demo não usado(This is only for demo purposes) -->

<!-- <script src="dist/js/pages/dashboard.js"></script>-->

<!-- AdminLTE for demo purposes -->

<script src="<?php echo base_url('public/js/demo.js')?>"></script>

<!-- plugin DataTables -->

<script src="<?php echo base_url('public/dist/data-tables/datatables.min.js')?>"></script>



<!-- jquery-mask -->

<script src="<?php echo base_url('public/dist/jquery-mask/js/jquery.mask.min.js')?>"></script>

<!-- main -->

<script src="<?php echo base_url('public/js/jquery.form.js')?>"></script>

<script src="<?php echo base_url('public/js/main.js')?>"></script>



<script>

$('.table_listar_data-table').DataTable({

 

 "language": {

        

    "sEmptyTable": "Nenhum registro encontrado",

    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",

    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",

    "sInfoFiltered": "(Filtrados de _MAX_ registros)",

    "sInfoPostFix": "",

    "sInfoThousands": ".",

    "sLengthMenu": "_MENU_ resultados por página",

    "sLoadingRecords": "Carregando...",

    "sProcessing": "Processando...",

    "sZeroRecords": "Nenhum registro encontrado",

    "sSearch": "Pesquisar",

    "oPaginate": {

        "sNext": "Próximo",

        "sPrevious": "Anterior",

        "sFirst": "Primeiro",

        "sLast": "Último"

   				 },

    "oAria": {

        "sSortAscending": ": Ordenar colunas de forma ascendente",

        "sSortDescending": ": Ordenar colunas de forma descendente"

    		}

}



    });

</script>



</body>

</html>

