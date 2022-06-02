<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Resume extends CI_Controller {

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
		$data['view'] = 'admin/resume/resume';
		$this->load->view('admin/template/index', $data);

	}

	public function inserir()

	{
		#if ($this->form_validation->run() == TRUE) {

			$dadosResume['contexto'] = $this->input->post('contexto');

			$dadosResume['motivacao'] = $this->input->post('motivacao');

			$dadosResume['objetivos'] = $this->input->post('objetivos');

			$dadosResume['produtos'] = $this->input->post('produtos');

			$id = 1;

			if ($id) {

				$this->resume_model->doUpdate($dadosResume, $id);

				redirect('admin/resume','refresh');

			}else{

				$this->resume_model->doInsert($dadosResume);

				redirect('admin/resume','refresh');

			}

		#}

	}

}