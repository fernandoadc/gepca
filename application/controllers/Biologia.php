<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biologia extends CI_Controller {

	public function index()
	{
		$data['view']		= 'site/biologia';
		$this->load->view('site/template/index', $data);
	}
}