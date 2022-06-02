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

            <div class="col-md-12 text-right">

              <a href="<?php echo base_url('admin/minicursos')?>" title="Voltar" class="btn btn-danger" ><i class="fa fa-reply-all"></i> Voltar</a>              

            </div>

          </div>

          <form class="form-horizontal" action="<?php echo base_url('admin/minicursos/coree')?>" method="post" accept-charset="utf-8" >

            <?php 

             // errosValidacao(); <!--<?php echo ($dados != NULL ? $dados->nome : set_value('nome'))

              getMsg('msgCadastro');



             ?>

          <div class="form-group">

              <label class="col-sm-2 control-label">Titulo</label>

            <div class="col-sm-8">

              <input type="titulo" name="titulo" class="form-control"  placeholder="Titulo da Palestra ou minicurso" value="<?php echo ($dadosMinicursos != NULL ? $dadosMinicursos->titulo : set_value('titulo')) ?>" required>

            </div>

          </div>

          <div class="form-group">

              <label class="col-sm-2 control-label">Área Temática</label>

            <div class="col-sm-8">

              <input type="text" name="areatematica"  class="form-control"  placeholder="ex.: computação" value="<?php echo ($dadosMinicursos != NULL ? $dadosMinicursos->area_tematica : set_value('areatematica')) ?>" required>

            </div>

          </div>

          <div class="form-group">

              <label class="col-sm-2 control-label">tipo</label>

            <div class="col-sm-8">

              <input type="text" name="tipo" class="form-control"  placeholder="ex.: Minicurso" value="<?php echo ($dadosMinicursos != NULL ? $dadosMinicursos->tipo_atividade : set_value('tipo')) ?>" required>

            </div>

          </div>
          <div class="form-group">

              <label class="col-sm-2 control-label">Valor</label>

            <div class="col-sm-8">

              <input type="tel" name="valor" class="form-control"  placeholder="ex.: 0.00" value="<?php echo ($dadosMinicursos != NULL ? $dadosMinicursos->tipo_atividade : set_value('valor')) ?>" required>

            </div>

          </div>

          <div class="form-group">

              <label class="col-sm-2 control-label" >Quant. vagas</label>

            <div class="col-sm-8">

              <input type="text" name="quant_vagas" class="form-control" value="<?php echo ($dadosMinicursos != NULL ? $dadosMinicursos->vagas : set_value('quant_vagas')) ?>"  placeholder="00" required>

            </div>

          </div>

          <div class="form-group">

              <label class="col-sm-2 control-label">Autor(es)</label>

            <div class="col-sm-8">

              <input type="text" name="autor" class="form-control"  placeholder="Ex.: nome do Palestrante" value="<?php echo ($dadosMinicursos != NULL ? $dadosMinicursos->autor : set_value('autor')) ?>" required>

            </div>

          </div>

          <div class="form-group">

              <label class="col-sm-2 control-label">Data</label>

            <div class="col-sm-8">

              <input type="text" name="data" class="form-control" placeholder="00/00/0000"  data-mask="00/00/0000" value="<?php echo ($dadosMinicursos != NULL ? $dadosMinicursos->data : set_value('data')) ?>" required>

            </div>

          </div>

          <div class="form-group">

              <label class="col-sm-2 control-label">Horário</label>

            <div class="col-sm-8">

              <input type="text" name="horario" class="form-control"  placeholder="ex: 08:30-12:00" value="<?php echo ($dadosMinicursos != NULL ? $dadosMinicursos->horario : set_value('horario')) ?>" required>

            </div>

          </div>

          <div class="form-group">

              <label class="col-sm-2 control-label">Local</label>

            <div class="col-sm-8">

              <input type="text" name="local" class="form-control"  placeholder="ex: UFOPA" value="<?php echo ($dadosMinicursos != NULL ? $dadosMinicursos->local : set_value('local')) ?>" required>

            </div>

          </div>

            <?php if(isset($dadosMinicursos)){?>

              <input type="hidden" name="id" value="<?= $dadosMinicursos->id ?>">

            <?php }?>

            <div class="form-group">

              <div class="col-sm-offset-2 col-sm-10">

                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Salvar</button>

              </div>

            </div>

          </form>

        </div>

      </div>

      <!-- /.box -->

    </section>