<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Computacao extends CI_Controller {

	public function index()
	{
		$data['view']		= 'site/computacao';
		$this->load->view('site/template/index', $data);
	}
}