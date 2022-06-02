<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Team extends CI_Controller {

	public function __construct(){

		parent:: __construct();

		$this->load->library('form_validation');
		$this->load->model('minicursos_model');

	}

	public function index()

	{

		$lista = $this->minicursos_model->getMinicursos();
		$data['lista']  = $lista;
		$data['view']		= 'site/team';

		$this->load->view('site/template/index', $data);

	}

}