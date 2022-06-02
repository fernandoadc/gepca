<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contatos extends CI_Controller {

	public function index()
	{
		$data['view']		= 'site/contatos';
		$this->load->view('site/template/index', $data);
	}
}