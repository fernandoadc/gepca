<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local extends CI_Controller {

	public function index()
	{
		$data['view']		= 'site/local';
		$this->load->view('site/template/index', $data);
	}
}