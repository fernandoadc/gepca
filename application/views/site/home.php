<section class="header">
      <!--<h2 class="title">GEPCA/UFOPA - Grupo de Estudo e Pesquisa em Computação Aplicada</h2>-->

      <div class="value-props row">
        <div class="four columns value-prop">
          <a href="<?php echo base_url('team') ?>"><img class="value-img" src="<?php echo base_url('public/images/users.png') ?>" width="100"></a>
          Meet our team. <br>
		  Conheça o nosso time.
        </div>
        <div class="four columns value-prop">
          <a href="prod.html"><img class="value-img" src="<?php echo base_url('public/images/products.png') ?>" width="100"></a>
          Products: softwares and more. <br>
          Produtos: softwares e mais. 
        </div>
        <div class="four columns value-prop">
          <a href="data.html"><img class="value-img" src="<?php echo base_url('public/images/dataset.png') ?>" width="100"></a>
          Publications: papers and more. <br>
		  Publicações: artigos e mais. 
	  </div>
    </div>
	    
</section>

<nav class="navbar">
  <div class="container">
    <h6>
      <b><br>GEPCA |</b> Grupo de Estudo<br> e Pesquisa em Computação Aplicada
    </h6>
  </div>
  <div class="container">
    <ul class="navbar-list">
    <li class="navbar-item"><a class="navbar-link" href="<?php echo base_url('homepage#resumo') ?>">Home</a></li>
    <li class="navbar-item"><a class="navbar-link" href="<?php echo base_url('team') ?>">Integrantes</a></li>
    <li class="navbar-item"><a class="navbar-link" href="prod.html">Produtos</a></li>
    <li class="navbar-item"><a class="navbar-link" href="<?php echo base_url('publications') ?>">Publicações</a></li> </ul>
  </div>
</nav>

  <div>
    <div class="img-section">
      <img src="<?php echo base_url('public/images/imgbest.png') ?>" alt="">
    </div>
    <div class="docs-section" id="resumo">
      <h4 class="docs-header">SOBRE</h4>
      <!--<?php foreach ($lista as $l) {?>
      <p><strong>Contexto.</strong> <?= $l->contexto ?></p>
      <p><strong>Motivação.</strong> <?= $l->motivacao ?></p>
      <p><strong>Objetivos.</strong> <?= $l->objetivos ?></p>
      <p><strong>Produtos.</strong> <?= $l->produtos ?>
      </p>
      <?php }?>-->
      <p>
      Desenvolve pesquisa no uso de técnicas e aplicações de inteligência computacional 
      nos contextos de análise de redes sociais, internet das coisas e educação. 
      Os pesquisadores do grupo buscam solucionar problemas reais que possuam contribuições socioeconômicas. 
      As áreas de aplicação perpassam por Mercados Eletrônicos, Educação, Saúde, Bioinformática, Cidades Inteligentes e 
      Agronegócio, por meio do desenvolvimento de sistemas de suporte à decisão e novas tecnologias de informação e comunicação.
      </p>
    </div>
  </div>
	
	  <div class="docs-section" id="info">
      <h4 class="docs-header">Demais Informações / Information</h4>

	    <table class="u-full-width">
          <!--<thead><tr><TD>Name</TD>-->
          <tbody>
            <?php foreach ($lista as $l) {?>
            <tr><td><b>Líderes/Leaders</b></td>
              <td>Fábio Manoel França Lobato, Éfren Lopes de Souza</td></tr>
            <tr><td><b>E-mail</b></td>
              <td><?= $l->email ?></td></tr>
            <tr><td><b>Endereço / Address</b></td>
              <td><?= $l->endereco ?></td></tr>
            <tr><td><b>Executora / Execution</b></td>
              <td><?= $l->executora ?><br>
                  Departamento de Ciência da Computação</td></tr>
            <tr><td><b>Fomento/Funding</b></td><td><?= $l->fomento ?></td></tr>
            <?php }?>
          </tbody>
      </table>
    </div>
    
