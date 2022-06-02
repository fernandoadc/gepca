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

				$group = 1; //grupo de usuarios administradores



				//se as informações forem inseridas na table USERS e uma sessão for aberta

					$this->load->model('ion_auth_model');

			    	if ($this->ion_auth->login($identity,$password,$remember)) {

			    	    if(!$this->ion_auth->is_admin()){

			    	        $this->logout();

			    	        setMsg('msgCadastro','Você não tem acesso a administração!', 'erro');

										redirect('admin/login','refresh');

			    	        

			    	    }else{

			    	    		redirect('admin/dashboard','refresh');

			    	    }

			    			    		

					} else {

						setMsg('msgCadastro','Algo deu errado, tente novamente!', 'erro');

						redirect('admin/login','refresh');

					}



			}

			 

			$data['view']		= 'admin/login/login';



			

			//template

			$this->load->view('site/template/index', $data);



			

	}



	public function cadastrar(){



		#valida os dados do formulario

		if ($this->ion_auth->logged_in() && $this->ion_auth->is_admin()) {

					setMsg('msgCadastro','Você já está logado no sistema!', 'erro');

					redirect('admin/dashboard','refresh');

				}else if(!$this->ion_auth->is_admin() && $this->ion_auth->logged_in()){

				    $this->ion_auth->logout();

				    setMsg('msgCadastro','Você já estava logado no sistema como participante! Entre com seus dados administrativos', 'erro');

				    redirect('admin/login','refresh');

				}

			$this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[6]');	

			$this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[6]|valid_email');

			$this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[6]|max_length[8]');

			$this->form_validation->set_rules('senhaconfirmacao', 'Confirmar senha', 'trim|required|min_length[6]|max_length[12]|matches[senha]', array('matches' => 'As senhas precisam ser iguais!') );



			if ($this->form_validation->run() == TRUE) {

				

				$username = $this->input->post('nome');

				$password = $this->input->post('senha');

				$email = $this->input->post('email');

	    	$group = array('1'); // Sets user to clientes.



	    		//gerar um codigo de verificação caso a senha tenha trocada

	    			$numero_de_bytes = 12;

						$random = random_bytes($numero_de_bytes);

						$new_code = bin2hex($random);

						$additional_data = [

											'activation_code' => $new_code, 

											'active' => 0,

											'activation_code' => $new_code

											];

 	

	    		//fazer o registro na table users

	    		if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {

	    					setMsg('msgCadastro','Cadastro realizado com sucesso, agora faça seu login!', 'sucesso');

	    					redirect('admin/login','refresh');

	    			}



			}



		$data['view'] = 'admin/login/cadastrar';

		//template

		$this->load->view('site/template/index', $data);



	}



	public function logout()

			{

				while ($this->ion_auth->logged_in()) {

					$this->ion_auth->logout();

					

				}

				redirect('admin/login','refresh');

				

			}



}