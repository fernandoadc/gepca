<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricao extends CI_Controller {

	public function index()
	{
	    $data['titulo'] = "Inscrições";
	    $data['view'] = 'admin/inscricoes/inscricoes';
		$this->load->view('admin/template/index', $data);
	}
}