<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aquicultura extends CI_Controller {

	public function index()
	{
		$data['view']		= 'site/aquicultura';
		$this->load->view('site/template/index', $data);
	}
}