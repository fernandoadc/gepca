<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Homepage extends CI_Controller {

	public function __construct(){

		parent:: __construct();

		$this->load->library('form_validation');
		$this->load->model('resume_model');

	}

	public function index()

	{

		$lista = $this->resume_model->getMinicursos();
		$data['lista']  = $lista;
		$data['view']		= 'site/home';

		$this->load->view('site/template/index', $data);

	}

}