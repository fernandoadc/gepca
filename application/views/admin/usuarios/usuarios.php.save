<div class="main-wrapper main-wrapper-1">
    
      <!-- Carregando barra de navegação-->
      <?php $this->load->view('admin/layout/navbar') ?>
      <!-- end barra de navegação-->
      <!-- Carregando barra de lateral-->
      <?php $this->load->view('admin/layout/sidebar') ?>
      <!-- end barra de lateral-->
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
           <!--table-->
           <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-block">
                    <h4><?php echo $titulo ?></h4>
                    <a data-toggle="tooltip" data-placement="top" title="Cadastrar" href="<?php echo base_url('admin/'.$this->router->fetch_class().'/core/')?>" class="btn btn-primary mr-2 
float-right">Cadastrar</a>
                  </div>
                  <div class="card-body">
                  <!--flasdata-->
                  <?php if($msg = $this->session->flashdata('sucesso')): ?>
                  <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      <p class="text-white"><?php echo $msg; ?></p>
                    </div>
                  </div>
                  <?php endif; ?>
                  <?php if($msg = $this->session->flashdata('erro')): ?>
                  <div class="alert alert-danger text-white alert-dismissible show fade">
                    <div class="alert-body">
                      <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                      </button>
                      <p class="text-white"><?php echo $msg; ?></p>
                    </div>
                  </div>
                  <?php endif; ?>
                  <!--fimFlashData-->
                    <div class="table-responsive">
                      <table class="table table-striped data-table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="nosort">Perfil</th>
                            <th class="nosort">Nome</th>
                            <th class="nosort">Email</th>
                            <th class="nosort">Telefone</th>
                            <th>Grupo</th>
                            <th>Status</th>
                            <th class="nosort">Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($usuarios as $usuario):?>
                          <tr>
                            <td><?php echo $usuario->id?></td>
                            <td><img alt="imagem-perfil" src=<?php echo base_url('uploads/usuarios/'.$usuario->user_image) ?> width="35" ></td>
                            <td><?php echo $usuario->first_name.' '.$usuario->last_name?></td>
                            <td><?php echo $usuario->email?></td>
                            <td><?php echo $usuario->phone?></td>
                            <td><?php echo ($this->ion_auth->is_admin($usuario->id)? '<div class="badge badge-success badge-shadow">Administrador</div>': '<div class="badge badge-info 
badge-shadow">Anunciante</div>')?></td>
                            <td><?php echo ($usuario->active? '<div class="badge badge-success badge-shadow">ativo</div>': '<div class="badge badge-info badge-danger">inativo</div>')?></td>
                            <td>
                              <a data-toggle="tooltip" data-placement="top" title="Editar" href="<?php echo base_url('admin/'.$this->router->fetch_class().'/core/'.$usuario->id)?>" class="btn btn-primary"><i 
class="fas fa-edit"></i></a>
                              <a data-toggle="tooltip" data-placement="top" title="Excluir" href="<?php echo base_url('admin/'.$this->router->fetch_class().'/delete/'.$usuario->id)?>" class="btn btn-warning 
delete" data-confirm="Tem certeza da exclusão do registro?"><i class="fas fa-trash-alt"></i></a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <!--end table-->
          </div>
        </section>
        <!--CofirugaraçãoTemplateStyle-->
        <?php $this->load->view('admin/layout/sidebarconfig')?>
       
      </div>
