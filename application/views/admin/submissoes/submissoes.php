

<section class="content-header">

      <h1>

        <?php echo $titulo; ?>

      </h1>

      

    </section>



    <!-- Main content -->

    <section class="content">



      <!-- Default box -->

      <div class="box">

        <div class="box-header with-border">

          <div class="row margin-botton-20">

            

          </div>

          <?php getMsg('msgCadastro') ?>

        <div class="table-responsive">

         <table class="table table-bordered table_listar_data-table" ">

            <thead>

              <tr>

                <td class="text-center">id</td>

                <td class="text-center">tipo</td>

                <td class="text-center">email</td>

                <td class="text-center">Área temática</td>

                <td class="text-center">Título do Trabalho</td>

                <td class="text-center">Autor(es)</td>

                <td class="text-right">Arquivo</td>

              </tr>

            </thead>

            <tbody>

              <!--?php foreach ($categorias as $cat) {?-->
              <?php foreach ($lista as $l) {?>
              <tr>
                
                <td><?= $l->id ?></td>

                <td><?= $l->tipotrabalho ?></td>

                <td><?= $l->email ?></td>

                <td><?= $l->areatematica ?></td>

                <td><?= $l->titulo ?></td>

                <td><?= $l->autor ?></td>

                <td > <a href="<?=base_url('uploads/').$l->arquivo ?>"><i class="fa fa-download"></i> baixar</a> </td>
                
              </tr>
               <?php }?>
               <!--?php }?-->

             

            </tbody>

          </table>

         </div> 

          

        </div>

      </div>

      <!-- /.box -->



    </section>