
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
          <div class="row margin-botton-20" style="margin-bottom: 5px;">
            <div class="col-md-12 text-right">
              <a href="<?php echo base_url('admin/minicursos/modulo')?>" title="Novo" class="btn btn-success" ><i class="fa fa-plus-circle"></i> Novo</a>              
            </div>
            
          </div>
          <?php getMsg('msgCadastro') ?>
        <div class="table table-responsive">
         <table class="table table-bordered table_listar_data-table" ">
            <thead>
              <tr>
                <td class="text-center">id</td>
                <td class="text-center">Tipo</td>
                <td class="text-center">Área Temática</td>
                <td class="text-center">Titulo</td>
                <td class="text-center">Quant. vagas</td>
                <td class="text-center">Autor(es)</td>
                <td class="text-right">Opções</td>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lista as $l) {?>
              <tr>
                <td><?= $l->id ?></td>
                <td><?= $l->tipo_atividade ?></td>
                <td><?= $l->area_tematica ?></td>
                <td><?= $l->titulo ?></td>
                <td class="text-center"><?= $l->vagas ?></td>
                <td><?= $l->autor ?></td>
                <td class="text-right">
                  
                  <a href="<?= base_url('admin/minicursos/modulo/'.$l->id) ?>" title= "Atualizar" class="btn btn-primary">
                    <i class="fa fa-pencil-square-o"></i>
                  </a>
                    
                   <a href="<?= base_url('admin/minicursos/del/'.$l->id) ?>" title= "Apagar" class="btn btn-danger btn-apagar-registro">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>
               <?php }?>
             
            </tbody>
          </table>
         </div> 
          
        </div>
      </div>
      <!-- /.box -->

    </section>