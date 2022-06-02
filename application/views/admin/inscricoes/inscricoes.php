
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
                <td class="text-center">Nome</td>
                <td class="text-center">telefone</td>
                <td class="text-center">Área temática</td>
                <td class="text-center">Minicurso</td>
                <td class="text-center">Pagamento</td>
                <td class="text-right">Opções</td>
              </tr>
            </thead>
            <tbody>
              <!--?php foreach ($categorias as $cat) {?-->
              <tr>
                <td></td>
                <td></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-center"></td>
                <td class="text-right">
                  <!--?= base_url('admin/categorias/modulo/'.$cat->id) ?-->
                  <a href="" title= "Atualizar" class="btn btn-primary">
                    <i class="fa fa-pencil-square-o"></i>
                  </a>
                    <!--?= base_url('admin/categorias/del/'.$cat->id) ?-->
                   <a href="" title= "Apagar" class="btn btn-danger btn-apagar-registro">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>
               <!--?php }?-->
             
            </tbody>
          </table>
         </div> 
          
        </div>
      </div>
      <!-- /.box -->

    </section>