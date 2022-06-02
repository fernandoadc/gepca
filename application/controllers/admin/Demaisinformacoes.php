<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Demaisinformacoes extends CI_Controller {

	public function __construct(){

		parent:: __construct();

		$this->load->library('form_validation');
		$this->load->model('resume_model');

		if (!$this->ion_auth->logged_in()) {

			redirect('admin/login','refresh');

		}

	}

	public function index()

	{

	  $lista = $this->resume_model->getMinicursos();
		$data['lista']  = $lista;
		$data['view'] = 'admin/demaisinformacoes/demaisinformacoes';
		$this->load->view('admin/template/index', $data);

	}

	public function inserir()

	{
		#if ($this->form_validation->run() == TRUE) {

			$dadosResume['coordenador'] = $this->input->post('coordenador');

			$dadosResume['email'] = $this->input->post('email');

			$dadosResume['endereco'] = $this->input->post('endereco');

			$dadosResume['executora'] = $this->input->post('executora');

			$dadosResume['keywords'] = $this->input->post('keywords');

			$dadosResume['fomento'] = $this->input->post('fomento');

			$dadosResume['vigencia'] = $this->input->post('vigencia');

			$id = 1;

			if ($id) {

				$this->resume_model->doUpdate($dadosResume, $id);


				redirect('admin/demaisinformacoes','refresh');

				setMsg('msgCadastro','Atualização realizada com sucesso!', 'sucesso');


			}else{

				$this->resume_model->doInsert($dadosResume);

				redirect('admin/demaisinformacoes','refresh');

				setMsg('msgCadastro','Atualização realizada com sucesso!', 'sucesso');

			}

		#}

	}

}