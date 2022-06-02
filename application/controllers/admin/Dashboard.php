<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Dashboard extends CI_Controller {

  public function __construct(){

		parent:: __construct();

		$this->load->library('form_validation');

		if (!$this->ion_auth->logged_in()) {

			redirect('admin/login','refresh');

		}

	}



	public function index()

	{

	  $data['view'] = 'admin/dashboard/dashboard';

		$this->load->view('admin/template/index', $data);

	}

}