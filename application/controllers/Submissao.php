<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Submissao extends CI_Controller {
  public function __construct()

	{

		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('upload');
		$this->load->model('submissao_model');

	

	}


	public function index()

	{

	    $dadosCliente='';
	    $submeteu = '';

		if ($this->ion_auth->logged_in()) {

			//dados da sessão ativa

		$dadosCliente = $this->ion_auth->user()->row();
		
		}
		
		//$lista = $this->submissao_model->getSubmissoes();
		$submeteu = $this->submissao_model->getSubmetido($dadosCliente->id);
		
		
		$data['data_user']  = $dadosCliente;

		if (isset($submeteu)) {
			if ($submeteu->status==1) {
				$data['view']		= 'site/submissao-realizada';
			}else{
				$data['view']		= 'site/submissao';
			}
		
		}else{
		$data['view']		= 'site/submissao';
		}
		$data['trabalho']  = $submeteu;
		$this->load->view('site/template/index', $data);

	}
	public function core(){

			$this->form_validation->set_rules('titulo', 'Titulo', 'required');
			$this->form_validation->set_rules('autor', 'Autor(es)', 'required');
			$this->form_validation->set_rules('tipotrabalho', 'Tipo', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('areatematica', 'Área Temática', 'required');
			

		if ($this->form_validation->run() == TRUE) {
			$infoUser = $this->ion_auth->user()->row();

			$dadosTrabalho['titulo'] = $this->input->post('titulo');

			$dadosTrabalho['areatematica'] = $this->input->post('areatematica');

			$dadosTrabalho['tipotrabalho'] = $this->input->post('tipotrabalho');

			$dadosTrabalho['email'] = $this->input->post('email');

			$dadosTrabalho['autor'] = $this->input->post('autor');

			

			$dadosTrabalho['id_user'] = $infoUser->id;

			$dadosTrabalho['status'] = 1;


			/**subir os arquivos pro servidor antes de gravar no banco

			date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
      		$ext = strtolower(substr($_FILES['upload']['name'],-4)); //Pegando extensão do arquivo
      		$new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
      		$dir = 'uploads/'; //Diretório para uploads

      		move_uploaded_file($_FILES['upload']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo

			//fim do processo de upload no server*/
			$upload = $_FILES['upload'];
			$n = $this->input->post('titulo');
			$nome = str_replace(" ","-",$n);
			$upload_path_url = base_url().'uploads/';
			$local_files  = './uploads/';
			$configuracao = array(
			'upload_path'   =>$local_files,
   			'allowed_types' => 'pdf',
   			'file_name'     => $nome.'.pdf',
   			'max_size'      => '10000'
  			 );  


			$dadosTrabalho['arquivo'] = $nome.'.pdf';

			$this->upload->initialize($configuracao);
			if ($this->upload->do_upload('upload')){


				$this->submissao_model->doInsert($dadosTrabalho);

				redirect('areadoaluno','refresh');

			}else{
				 echo $this->upload->display_errors();
				//redirect('submissao','refresh');
			}


				

	
		} else {

		redirect('site/submissao','refresh');

		}



	}

}