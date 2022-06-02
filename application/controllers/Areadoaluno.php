<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Areadoaluno extends CI_Controller {

	public function __construct(){

			parent:: __construct();

			$this->load->model('areadoaluno_model');
			$this->load->model('minicursos_model');

			if (!$this->ion_auth->logged_in()) {

			redirect('/','refresh');

		}

		}

	public function index()

	{

		$dadosCliente='';
		if ($this->ion_auth->logged_in()) {
			//dados da sessão ativa
		$dadosCliente = $this->ion_auth->user()->row();
		}

		$sandbox = 'https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';

		$producao = 'https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js';
		$lista = $this->minicursos_model->getMinicursos();
		$data['lista']  = $lista;
		$data['pagseguro'] = $sandbox;
		$data['data_user']  = $dadosCliente;
		$data['adminlte']   = '';
		$data['view']		= 'site/area-do-aluno';
		$this->load->view('site/template/index', $data);

	}

	public function dados_cep()

		{	



			$cep = $this->input->post('vcep');

			$url_cep = 'https://viacep.com.br/ws/'.$cep.'/xml/';

			$crul = simplexml_load_file($url_cep);

			$r = json_encode($crul);

			$resultado = json_decode($r);

	

			$ret = [

				'cep' => $resultado->cep,

				'endereco' => $resultado->logradouro,

				'bairro' => $resultado->bairro,

				'cidade' => $resultado->localidade,

				'estado' => $resultado->uf,

				'cep' => $resultado->cep

			];



			echo json_encode($ret);

		}

}