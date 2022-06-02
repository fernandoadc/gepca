<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Coordenadores extends CI_Controller {

	public function __construct(){

		parent:: __construct();

		$this->load->library('form_validation');
		$this->load->model('minicursos_model');

		if (!$this->ion_auth->logged_in()) {

			redirect('admin/login','refresh');

		}

	}

	public function index()

	{

	  $user = $this->ion_auth->user()->row();
		#$data['data_solicitacoes'] = $this->submissao_model->getSolicitacoes($user->id);
		#$data['data_user'] = $user;
		#$data['titulo'] = "Solicitações";
		$data['view'] = 'admin/coordenadores/coordenadores';
		$this->load->view('admin/template/index', $data);

	}

	public function inserir()

	{
		#if ($this->form_validation->run() == TRUE) {

			$dadosMinicursos['nome'] = $this->input->post('nome');

			$dadosMinicursos['categoria'] = $this->input->post('categoria');

			if($dadosMinicursos['categoria'] == 'Coordenador'){
				$dadosMinicursos['tipo'] = 1;
			}elseif($dadosMinicursos['categoria'] == 'Pesquisador'){
				$dadosMinicursos['tipo'] = 2;
			}else {
				$dadosMinicursos['tipo'] = 3;
			}

			$dadosMinicursos['descricao'] = $this->input->post('descricao');

			$dadosMinicursos['lattes'] = $this->input->post('lattes');

			$this->minicursos_model->doInsert($dadosMinicursos);

			redirect('admin/coordenadores','refresh');

		#}

	}

}
