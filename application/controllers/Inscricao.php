<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricao extends CI_Controller {

	public function index()
	{
		$data['jquery_form_login'] = '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>';
		$data['view']		= 'site/inscricao-e-submissao';
		$this->load->view('site/template/index', $data);
	}
}