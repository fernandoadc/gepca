<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atividades extends CI_Controller {

	public function index()
	{
		$data['view']		= 'site/atividades';
		$this->load->view('site/template/index', $data);
	}
}