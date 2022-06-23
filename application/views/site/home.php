<section class="header">
     <!-- <h2 class="title">GEPCA/UFOPA - Grupo de Estudo e Pesquisa em Computação Aplicada</h2>-->

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
      <b><br>Grep.Comp |</b> Grupo de Estudo<br> e Pesquisa em Computação Aplicada
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

 <!-- <div class="img-section">
      <img src="<?php echo base_url('public/images/imgbest.png') ?>" alt="">
  </div>-->
  <div class="docs-section" id="resumo">
    <h4 class="docs-header">Sobre</h4>
    <!--<?php foreach ($lista as $l) {?>
	  <p><strong>Contexto.</strong> <?= $l->contexto ?></p>
	  <p><strong>Motivação.</strong> <?= $l->motivacao ?></p>
	  <p><strong>Objetivos.</strong> <?= $l->objetivos ?></p>
	  <p><strong>Produtos.</strong> <?= $l->produtos ?>
	  </p>
    <?php }?>-->
	  <p>
    O Grupo de Estudo e Pesquisa em Computação Aplicada (Grep.Comp) da UFOPA foi formado em 2017 e registrado no Diretório de Grupos de Pesquisa do Conselho Nacional de Desenvolvimento Científico e Tecnológico (CNPq). Sediado no coração da floresta Amazônica, 
    o grupo é formado por pesquisadores e pesquisadoras de diversas instituições, interessados em desenvolver e aplicar técnicas de inteligência computacional nos contextos de análise de redes sociais, internet das coisas e educação. 
    </p>
    <p>
    Os(as) pesquisadores(as) do grupo buscam solucionar problemas reais que possuam contribuições socioeconômicas.  Os projetos de Pesquisa e Desenvolvimento conduzidos no âmbito do Grep.Comp possuem como principais agências financiadoras o Conselho Nacional de Desenvolvimento Científico e Tecnológico (CNPq), 
    Fundação Amazônia de Amparo a Estudos e Pesquisas, no Pará (FAPESPA), Fundação de Amparo à Pesquisa e ao Desenvolvimento Científico e Tecnológico do Maranhão (FAPEMA) e o  Serviço Alemão de Intercâmbio Acadêmico - <b>Deutscher Akademischer Austauschdienst</b> (DAAD). Os projetos perpassam por Mercados Eletrônicos, 
    Educação, Saúde, Bioinformática, Cidades Inteligentes e Agronegócio, por meio do desenvolvimento de sistemas de suporte à decisão e novas tecnologias de informação e comunicação.
    </p>
	</div>

	  <div class="docs-section" id="info">
      <h4 class="docs-header">Informações / Information</h4>

	    <table class="u-full-width">
          <!--<thead><tr><TD>Name</TD>-->
          <tbody>
            <?php foreach ($lista as $l) {?>
            <tr><td><b>Líderes / Leaders</b></td>
              <td>Fábio Manoel França Lobato, Éfren Lopes de Souza</td></tr>
            <tr><td><b>E-mail</b></td>
              <td><?= $l->email ?></td></tr>
            <tr><td><b>Endereço / Address</b></td>
              <td><?= $l->endereco ?></td></tr>
            <tr><td><b>Área Predominante</b></td>
              <td>Ciências Exatas e da Terra; Ciência da Computação</td></tr>
            <tr><td><b>Instituição do Grupo</b></td>
              <td>Universidade Federal do Oeste do Pará - UFOPA</td></tr>
            <tr><td><b>Fomento / Funding</b></td><td>CNPq, FAPESPA, FAPEMA, DAAD</td></tr>
            <tr><td><b>DGP - CNPq</b></td><td><a href="http://dgp.cnpq.br/dgp/espelhogrupo/2969843796195905" target="blank" style="color: #373A37; text-decoration: none;">dgp.cnpq.br/dgp/espelhogrupo/2969843796195905</a></td></tr>
            <?php }?>
          </tbody>
      </table>
    </div>
    
