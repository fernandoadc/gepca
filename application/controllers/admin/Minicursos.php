<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Minicursos extends CI_Controller {

    public function __construct()

	{

		parent::__construct();

		$this->load->library('form_validation');

		$this->load->model('minicursos_model');

	

	}



	public function index()

	{

	  $lista = $this->minicursos_model->getMinicursos();

		$data['lista']  = $lista;

		$data['titulo'] = 'Minicursos e Palestras';

		$data['view'] = 'admin/minicursos/minicursos_e_palestras';

		$this->load->view('admin/template/index', $data);

	}

	public function modulo($id=NULL){

			$dadosMinicursos = NULL;

		if ($id) {

				$data['titulo'] = 'Atualizar Minicurso ou Palestra';

				$dadosMinicursos = $this->minicursos_model->getMinicurso($id);

				if (!$dadosMinicursos) {

	 				setMsg('msgCadastro','Minicurso ou Palestra não encontrada!');

	 				redirect('admin/minicursos','refresh');

				}

			}else{

			$data['titulo'] = 'Inserir novo Minicurso ou Palestra';

			}



		$data['view'] = 'admin/minicursos/modulo';

		$data['dadosMinicursos'] = $dadosMinicursos;

		$this->load->view('admin/template/index', $data);

	}

	public function coree(){

	  

			$this->form_validation->set_rules('titulo', 'Titulo', 'required');

			$this->form_validation->set_rules('areatematica', 'Área Temática', 'required');

			$this->form_validation->set_rules('tipo', 'Tipo', 'required');
			$this->form_validation->set_rules('valor', 'Valor', 'required');

			$this->form_validation->set_rules('quant_vagas', 'Quantidade de Vagas', 'required');

			$this->form_validation->set_rules('autor', 'Autor(es)', 'required');

			$this->form_validation->set_rules('data', 'Data', 'required');

			$this->form_validation->set_rules('horario', 'Horário', 'required');

			$this->form_validation->set_rules('local', 'Local', 'required');



		if ($this->form_validation->run() == TRUE) {



			$dadosMinicursos['titulo'] = $this->input->post('titulo');

			$dadosMinicursos['area_tematica'] = $this->input->post('areatematica');

			$dadosMinicursos['tipo_atividade'] = $this->input->post('tipo');

			$dadosMinicursos['vagas'] = $this->input->post('quant_vagas');
			$dadosMinicursos['valor'] = $this->input->post('valor');

			$dadosMinicursos['autor'] = $this->input->post('autor');

			$dadosMinicursos['data'] = $this->input->post('data');

			$dadosMinicursos['horario'] = $this->input->post('horario');

			$dadosMinicursos['local'] = $this->input->post('local');





			$id = $this->input->post('id');

			if ($this->input->post('id')) {

				

				$this->minicursos_model->doUpdate($dadosMinicursos, $id);

				redirect('admin/minicursos','refresh');

			}else{

				$this->minicursos_model->doInsert($dadosMinicursos);

				redirect('admin/minicursos','refresh');

			}





		} else {

			$this->modulo();

		}



	}

	public function del($id=NULL){

		if ($id) {

			if ($this->minicursos_model->deleteMinicurso($id)) {

				redirect('admin/minicursos','refresh');

			}else{

				redirect('admin/minicursos','refresh');

			}

		}

	

	}

}