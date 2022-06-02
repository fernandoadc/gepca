<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Palestras extends CI_Controller {

	public function __construct()
{
	parent:: __construct();
		$this->load->library('form_validation');
		$this->load->model('minicursos_model');
		if (!$this->ion_auth->logged_in()) {
			redirect('login','refresh');
		}
}

	public function index()
	{
	    $dadosCliente='';
		if ($this->ion_auth->logged_in()) {
			//dados da sessão ativa
		$dadosCliente = $this->ion_auth->user()->row();

		}
		$lista = $this->minicursos_model->getSomentePalestras();
		$data['lista']  = $lista;
		$data['titulo'] = 'Minicursos';
		$data['data_user']  = $dadosCliente;
		$data['view']		= 'site/palestras';
		$this->load->view('site/template/index', $data);
	}
}