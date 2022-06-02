<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
			parent:: __construct();
			$this->load->library('form_validation');

			#$this->load->model('ion_auth_model');
			#$this->load->library('email');

		}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]|valid_email');
			$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[12]');
			
		
			$login[] = '';
			if ($this->form_validation->run() == TRUE) {
				
				$identity = $this->input->post('email');
			    $password = $this->input->post('senha');
			    $remember = ($this->input->post('manterconectado')!= NULL? TRUE : FALSE);
				$group = 2; //grupo de usuarios clientes

				//se as informações forem inseridas na table USERS e uma sessão for aberta
					$this->load->model('ion_auth_model');
			    	if ($this->ion_auth->login($identity,$password,$remember)) {
			    		redirect('areadoaluno','refresh');		    		
					} else {
						setMsg('msgCadastro','Algo deu errado, tente novamente!', 'erro');
						redirect('login','refresh');
					}

			}
			 
			$data['view']		= 'site/login';

			
			//template
		$this->load->view('site/template/index', $data);

			
	}

	public function cadastrar(){

		#valida os dados do formulario
		if ($this->ion_auth->logged_in()) {
					setMsg('msgCadastro','Você já está logado no sistema!', 'erro');
						redirect('areadoaluno','refresh');
				}
			$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[6]');	
			$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]|valid_email|is_unique[users.email]', array('is_unique' => 'O Email já está cadastrado no sistema'));
			$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[8]');
			$this->form_validation->set_rules('senhaconfirmacao', 'Confirmar senha', 'trim|required|min_length[6]|max_length[12]|matches[senha]', array('matches' => 'As senhas precisam ser iguais!') );
			$this->form_validation->set_rules('categoria', 'Categoria', 'trim|required|min_length[1]');

			if ($this->form_validation->run() == TRUE) {
				
				$username = $this->input->post('nome');
				$password = $this->input->post('senha');
				$email = $this->input->post('email');
	    		$group = array('2'); // Sets user to clientes.

	    		//gerar um codigo de verificação caso a senha tenha trocada
	    				$numero_de_bytes = 12;
						$random = random_bytes($numero_de_bytes);
						$new_code = bin2hex($random);
						$additional_data = [
											'category' => $this->input->post('categoria'),
											'activation_code' => $new_code, 
											'active' => 0,
											'activation_code' => $new_code
											];
 	
	    		//fazer o registro na table users
	    		if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
	    					setMsg('msgCadastro','Cadastro realizado com sucesso, agora faça seu login!', 'sucesso');
	    				redirect('login','refresh');
	    			}

			}

		$data['view'] = 'site/cadastrar';
			//template
		$this->load->view('site/template/index', $data);

	}

	public function logout()
			{
				while ($this->ion_auth->logged_in()) {
					$this->ion_auth->logout();
					
				}
				redirect('login','refresh');
				
			}

}