<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Pagseguro extends CI_Controller {

	public function __construct()

	{

		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('minicursos_model');

	}



	public function index(){

		redirect('/','refresh');

		

	}

	public function pg_session_id(){

	    

		 //pego as configurações do pagseguro

		$sandbox = 1;

		$producao = 2;





		#montar a url para montar a session de pagamento no pagseguro

		if ($sandbox==1) {

			# ambiente sandbox

			$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/sessions';

		}else{

			# ambiente produção

			$url = 'https://ws.pagseguro.uol.com.br/v2/sessions';

		}



		$param['email'] = 'michellefugimura@yahoo.com.br';

		$param['token'] = '8B46035DBE0546BD82D2B660448A96EF';



		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_POST, count($param));

		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($param));

		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 45);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($ch, CURLOPT_USERAGENT, "Mozzila/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");



			# Verificação do SSL (em modo sandbox não é obrigatório)

		if ($sandbox ==1) {

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		}else{

			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);

		}



		$result = curl_exec($ch);

		curl_close($ch);



		$xml = simplexml_load_string($result);

		

		$json = json_encode($xml);

		$std =  json_decode($json);

		

			//verifica se a session foi gerada

		

		if (isset($std->id)) {

			$json = [

				'erro' => 0,

				'msg'  =>'Sucesso',

				'id_sessao' => $std->id

			

			];

			

		}else{

			$json = [

				'erro' => 5000,

				'msg'  => 'Erro ao gerar sessao de pagamento.'



			];

		}

			header('Content-type: application/json');

		echo json_encode($json);



	}



//======================Pagamento Boleto===================

	public function pg_boleto(){
		$sandbox = 1;
		$producao = 2;
		$retorno = '';

		/*se houver um id (cliente logado), não é checado se existe CPF e email cadastrado no sistema */

		 $this->form_validation->set_rules('email', 'Email', 'required');
		 $this->form_validation->set_rules('cpf', 'CPF', 'required');
	    $this->form_validation->set_rules('telefone', 'Telefone', 'required');
	    $this->form_validation->set_rules('cep_c', 'CEP', 'required');
	    $this->form_validation->set_rules('endereco', 'Endereço', 'required');
	    $this->form_validation->set_rules('numero', 'Número', 'required');
	    $this->form_validation->set_rules('bairro', 'Bairro', 'required');
	    $this->form_validation->set_rules('cidade', 'Cidade', 'required');
	    $this->form_validation->set_rules('estado', 'Estado', 'required');
	    $this->form_validation->set_rules('valortotal', 'Valor total', 'required');

			if ($this->form_validation->run() == TRUE){

				//dados para o pagamento via boleto

				$data["email"]='michellefugimura@yahoo.com.br';

				$data['token'] = '8B46035DBE0546BD82D2B660448A96EF';

				$data['paymentMode'] = 'default';

				$data['senderHash'] = $this->input->post('hash');//$data['hash'] funciona no sandbox

				$data['paymentMethod'] = 'boleto';

				$data['receiverEmail'] = 'michellefugimura@yahoo.com.br';

				$data['senderName'] = $this->input->post('nome');

				//pegando o codigo de área e o telefone

				$str = $this->input->post('telefone');

				$str1 = str_replace('(', '', $str);

				$str2 = str_replace(')', '', $str1);

				$str3 = str_replace(' ', '', $str2);

				$str4 = str_replace('-', '', $str3);

				$code_area = substr($str4, 0, 2);

				$telefone = substr($str4, 2, 10);

				$data['senderAreaCode'] = $code_area;

				$data['senderPhone'] = $telefone;

				$data['senderEmail'] = $this->input->post('email');

				//desformatar  CPF

				$st = $this->input->post('cpf');

				$str_sem_pontos = str_replace('.', '', $st);

				$cpf_sem_formatacao = str_replace('-', '', $str_sem_pontos);

				$data['senderCPF'] = $cpf_sem_formatacao;

				$data['currency'] = 'BRL';

				$data['itemId1'] = 'ctda2019-cat';
				$data['itemQuantity1'] = 1;
				$data['itemDescription1'] = $this->input->post('descricao');
				$data['itemAmount1'] = $this->input->post('valortotal').'.00';
				//DADOS CARRINHO DE COMPRAS
				$valor_com_desconto = '';
				$valor_sem_desconto = '';
				$valortotalfretecarrinho = '';
				#$produtos = $this->carrinhocompra->listarProdutos();
				$i = 1;
				$data['reference'] = $cpf_sem_formatacao;
			    //endereço da entrega
				$data["shippingAddressStreet"]=$this->input->post('endereco');

				$data["shippingAddressNumber"]=$this->input->post('numero');

				$data["shippingAddressComplement"]="sem complemento";

				$data["shippingAddressDistrict"]=$this->input->post('bairro');

				$cep_comprador = $this->input->post('cep_c');

				$cep = str_replace('-', '', $cep_comprador);

				$data["shippingAddressPostalCode"]= $cep;

				$data["shippingAddressCity"]=$this->input->post('cidade');

				$data["shippingAddressState"]=$this->input->post('estado');

				$data["shippingAddressCountry"]="BRA";

				$data["shippingType"]="3";#tipo de frete desconhecido
				$data["shippingCost"]="0.00";
				$data['extraAmount'] = "0.00"; //coloca o valordo frete como xtra já que frete é opicional
				$data['notificationURL=']= '';
				//fim entrega
				$emailPagseguro = 'michellefugimura@yahoo.com.br';
				$data = http_build_query($data);
				 //configurações do ambiente pagseguro para fazer a transação
				$url ='';
				if ($sandbox ==1) {
					# ambiente sandbox
					$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions'; //URL de teste
				}else{
					# ambiente produção
					$url = 'https://ws.pagseguro.uol.com.br/v2/transactions';
				}

					$curl = curl_init($url);

					curl_setopt( $curl,CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded; charset=UTF-8'

						));

					curl_setopt($curl, CURLOPT_URL, $url);

					curl_setopt($curl, CURLOPT_POST, true);

					curl_setopt($curl,CURLOPT_RETURNTRANSFER, true );

					curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, ($sandbox == 1 ? false : true));

					curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

					//curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

					curl_setopt($curl, CURLOPT_HEADER, false);

					$xml = curl_exec($curl);

					curl_close($curl);

					$xmlf= simplexml_load_string($xml);

					$j = json_encode($xmlf);

					$jj = (array)json_decode($j);

					if (!isset($jj['error']) && isset($jj['paymentLink'])) {

						$cod_transacao         = $jj['code'];

						$cod_referencia        = $jj['reference'];

						$status 			   = $jj['status'];

						$boletoLink 		   =  $jj['paymentLink'];

						$code 				   =  $jj['code'];

						$date 				   =  $jj['date'];

						

						//grava os dados complementares do usuario table users
						$user_ativo = $this->ion_auth->logged_in();
						$id = $user_ativo['id'];
					    $data = array(
									'cpf'			=> $this->input->post('cpf'),
									'telefone'		=> $this->input->post('telefone'),
									'cep'			=> $this->input->post('cep'),
									'endereco'		=> $this->input->post('endereco'),
									'numero'		=> $this->input->post('numero'),
									'bairro'		=> $this->input->post('bairro'),
									'complemento'	=> $this->input->post('complemento'),
									'cidade'		=> $this->input->post('cidade'),
									'estado'		=> $this->input->post('estado'),
					           );
					    $this->ion_auth->update($id, $data);

						//=====================================
						//grava os dados do pagamento

						$dados_pagamento = [

									'id_user' 	=> $user_ativo,
									'descricao' 	=>$this->input->post('descricao'),
									'referencia_pedido' =>$cod_referencia,
									'codigo_transacao' => $cod_transacao,
									'link_boleto' => $boletoLink
								];
						$this->minicursos_model->doInsertPagamento($dados_pagamento);

						#retorno AJAX

						$retorno = ['paymentLink' => $boletoLink,'erro' => 0,'msg'  => 'Parabéns pela compra!'];

						#$this->registraPedido($dados_pagamento);

						

					}else{

					$retorno = ['erro' => 10,//'msg'  => 'Ocorreu um erro ao efetuar pagamento! Tente novamente!'
					'msg' => $jj['error']
				];

					}

		}else{

			$retorno = ['erro' => 10,'msg'  => validation_errors()];

		}//fim form validation

		echo json_encode($retorno);

	}

	//======================Pagamento Cartão de Crédito===================

	public function pg_cartao() {
		$sandbox = 1;
		$producao = 2;
		$this->form_validation->set_rules('nome', 'Nome', 'required');
	    $this->form_validation->set_rules('cpf', 'CPF', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('telefone', 'Telefone', 'required');
	    $this->form_validation->set_rules('cep_c', 'CEP', 'required');
	    $this->form_validation->set_rules('endereco', 'Endereço', 'required');
	    $this->form_validation->set_rules('numero', 'Número', 'required');
	    $this->form_validation->set_rules('bairro', 'Bairro', 'required');
	    $this->form_validation->set_rules('cidade', 'Cidade', 'required');
	    $this->form_validation->set_rules('estado', 'Estado', 'required');
	    $this->form_validation->set_rules('cc_numero', 'Número Cartão', 'required');
	    $this->form_validation->set_rules('cc_titular', 'Titular do cartão', 'required');
	    $this->form_validation->set_rules('cc_validade', 'Validade do Cartão', 'required');
	    $this->form_validation->set_rules('cc_codigo', 'Código de Segurança', 'required');
		if ($this->form_validation->run() == TRUE) {
		$tokenCard=$this->input->post('cc_tokencard');
		$hashCard=$this->input->post('hashCard');
		#$qtdParcelas= $this->input->post('QtdParcelas');
		#$valorParcelas=$this->input->post('ValorParcelas');
			$str = $this->input->post('telefone');
			$str1 = str_replace('(', '', $str);
			$str2 = str_replace(')', '', $str1);
			$str3 = str_replace(' ', '', $str2);
			$str4 = str_replace('-', '', $str3);
			$code_area = substr($str4, 0, 2);
			$telefone = substr($str4, 2, 10);
			$st = $this->input->post('cpf');
			$str_sem_pontos = str_replace('.', '', $st);
			$cpf_sem_formatacao = str_replace('-', '', $str_sem_pontos);
			//dados para o pagamento via bleto
			#$query = $this->pagar_model->getConfigPagSeguro();
			$data['token'] = '8B46035DBE0546BD82D2B660448A96EF'; //token sandbox test
			//$data['hash'] = $this->input->post('hash');
			$data["email"]='michellefugimura@yahoo.com.br';
			#$data["token"]=$query->token; //token sandbox test
			$data["paymentMode"]="default";
			$data["paymentMethod"]="creditCard";
			$data["receiverEmail"]='michellefugimura@yahoo.com.br';
			$data["currency"]="BRL";
					//DADOS CARRINHO DE COMPRAS

		$valor_com_desconto = '';
		$valor_sem_desconto = '';
		$valortotalfretecarrinho = '';
		#$produtos = $this->carrinhocompra->listarProdutos();
		$i = 1;
			$data['reference'] = $cpf_sem_formatacao;

			$data['itemId1'] = 'ctda2019-cat';
				$data['itemQuantity1'] = 1;
				$data['itemDescription1'] = $this->input->post('descricao');
				$data['itemAmount1'] = $this->input->post('valortotal').'.00';
				$data['shippingAddressRequired'] = 'false';
			$data['extraAmount'] = '0.00'; //coloca o valordo frete como xtra já que frete é opicional
			$data["notificationURL="]="";
			$data["senderName"]=$this->input->post('nome');
			$data["senderCPF"]=$cpf_sem_formatacao;
			$data["senderAreaCode"]=$code_area;
			$data["senderPhone"]=$telefone;
			$data["senderEmail"]=$this->input->post('email');
			$data["senderHash"]=$hashCard;
			$data["creditCardToken"]=$tokenCard;
			$data["installmentQuantity"]=1;
			$data["installmentValue"]=$this->input->post('valortotal').'.00';
			$data["noInterestInstallmentQuantity"]=2;
			$data["creditCardHolderName"]=$this->input->post('cc_titular');

			//desformatar  CPF
			$cc_st = $this->input->post('cc_cpf');
			$cc_str_sem_pontos = str_replace('.', '', $cc_st);
			$cc_cpf_sem_formatacao = str_replace('-', '', $cc_str_sem_pontos);
			$data["creditCardHolderCPF"]=$cc_cpf_sem_formatacao;//falata um input aqui
			$data["creditCardHolderBirthDate"]=$this->input->post('cc_data_nascimento');
			$data["creditCardHolderAreaCode"]=$code_area;
			$data["creditCardHolderPhone"]=$telefone;
			$data["billingAddressStreet"]=$this->input->post('endereco');
			$data["billingAddressNumber"]=$this->input->post('numero');
			$data["billingAddressComplement"]='sem complemento';
			$data["billingAddressDistrict"]=$this->input->post('bairro');
			$data["billingAddressPostalCode"]=$this->input->post('cep_c');
			$data["billingAddressCity"]=$this->input->post('cidade');
			$data["billingAddressState"]=$this->input->post('estado');
			$data["billingAddressCountry"]="BRA";
		$BuildQuery=http_build_query($data);
 		//configurações do ambiente pagseguro para fazer a transação
		$url ='';
		if ($sandbox==1) {
			# ambiente sandbox
			$url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions'; //URL de teste
		}else{
			# ambiente produção
			$url = 'https://ws.pagseguro.uol.com.br/v2/transactions';
		}

		$Curl=curl_init($url);
		curl_setopt($Curl,CURLOPT_HTTPHEADER,Array("Content-Type: application/x-www-form-urlencoded; charset=UTF-8"));
		curl_setopt($Curl,CURLOPT_POST,true);
		curl_setopt($Curl, CURLOPT_SSL_VERIFYPEER, ($sandbox == 1 ? false : true));
		curl_setopt($Curl,CURLOPT_RETURNTRANSFER,true);
		curl_setopt($Curl,CURLOPT_POSTFIELDS,$BuildQuery);
		$ret=curl_exec($Curl);
		curl_close($Curl);
		$Xml=simplexml_load_string($ret);
		$result =json_encode($Xml);
		$arrayResultDecode = (array) json_decode($result);
		if (! isset($arrayResultDecode['error'])) {
		$cod_transacao = $arrayResultDecode['code'];
		$cod_referencia = $arrayResultDecode['reference'];
		$status_da_transacao = $arrayResultDecode['status'];
		$data_transacao = $arrayResultDecode['date'];
		$issete = $arrayResultDecode['reference'];
		//frete
		$st = $this->input->post('frete-total-capturado');
		$a = str_replace('R$ ','',$st);
		$frete_valor_acumulado = str_replace(',','.',$a);
		//grava os dados complementares do usuario table users
						$user_ativo = $this->ion_auth->logged_in();
						$id = $user_ativo['id'];
					    $data = array(
									'cpf'			=> $this->input->post('cpf'),
									'telefone'		=> $this->input->post('telefone'),
									'cep'			=> $this->input->post('cep_c'),
									'endereco'		=> $this->input->post('endereco'),
									'numero'		=> $this->input->post('numero'),
									'bairro'		=> $this->input->post('bairro'),
									'complemento'	=> $this->input->post('complemento'),
									'cidade'		=> $this->input->post('cidade'),
									'estado'		=> $this->input->post('estado'),
					           );
					    $this->ion_auth->update($id, $data);
						//=====================================
						//grava os dados do pagamento
						$dados_pagamento = [
									'id_user' 	=> $user_ativo,
									'descricao' 	=>$this->input->post('descricao'),
									'referencia_pedido' =>$cod_referencia,
									'codigo_transacao' => $cod_transacao,
								];
						$this->minicursos_model->doInsertPagamento($dados_pagamento);
		$retorno = [

					'erro' => 0,

					'msg'  => 'Processo de compra realizado com sucesso. Agradecemos a preferência! Volte sempre!',

					'codeTransacao' =>$status_da_transacao,

					'ref' => $arrayResultDecode['reference']

					];


		echo json_encode($retorno);

		//FIM RETORNO AJAX

	}else{
		$retorno = [
					'erro' => 10,
					'msg'  => $arrayResultDecode['error']
					];
		echo json_encode($retorno);
	}

	}else{

		//RETORNO PARA O AJAX (CASO INSUCESSO)

		$retorno = [

					'erro' => 10,

					'msg'  => validation_errors(),

					];



		echo json_encode($retorno);

	}

	    

	}


	/*public function registrarCliente($dados= NULL, $id_cliente = NULL, $pass=NULL)

	{

		if (is_array($dados) && $id_cliente) {

				$username = $dados['nome'];

				$password = $pass;

				$email = $dados['email'];

				$additional_data = ['id_cliente' => $id_cliente];

				$group  = [2];

				$remember = TRUE; // remember the user

				if($this->ion_auth->register($username, $password, $email, $additional_data, $group)!= FALSE){

					 $this->ion_auth->login($email, $password, $remember);

				}

		}

	}

	*/

	public function mensagem_parabens()

	{

		

		//Dados da Loja

		$this->load->model('loja/loja_model');

		$query = $this->loja_model->getDadosLoja();

		//dados menu

		

		$data['titulo'] = 'Compra Finalizada';

		$data['categorias'] = $this->loja_model->getCategorias();

		$data['dados_loja'] = $query;

		$data['view'] = 'loja/checkout/compra_concluida';

		$this->load->view('loja/template/index', $data);

		

	}

	public function mensagem_parabens_com_boleto($link = NULL)

	{

	    echo '<pre>';

	    echo $link;

	    echo '</pre>';

	    exit;

		

		//Dados da Loja

		$this->load->model('loja/loja_model');

		$query = $this->loja_model->getDadosLoja();

		//dados menu

		

		$data['titulo'] = 'Compra Finalizada';

		$data['categorias'] = $this->loja_model->getCategorias();

		$data['dados_loja'] = $query;

		$data['view'] = 'loja/checkout/compra_concluida';

		$this->load->view('loja/template/index', $data);

	}



	

}//atualizado