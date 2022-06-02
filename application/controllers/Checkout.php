<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atividades extends CI_Controller {

	public function index()
	{
		$data['view']		= 'site/atividades';
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