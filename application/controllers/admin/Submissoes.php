<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Submissoes extends CI_Controller {

public function __construct()

	{

		parent::__construct();

		$this->load->library('form_validation');

		$this->load->model('submissao_model');

	

	}

	public function index()

	{
		 	$lista = $this->submissao_model->getSubmissoes();

			$data['lista']  = $lista;

	    $data['titulo'] = "Trabalhos Submetidos";

	    $data['view'] = 'admin/submissoes/submissoes';

		$this->load->view('admin/template/index', $data);

	}

}