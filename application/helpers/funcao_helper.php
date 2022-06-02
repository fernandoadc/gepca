<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function setMsg($id,$msg, $tipo){
	$CI =& get_instance();
	switch ($tipo) {
		case 'erro':
			$CI->session->set_flashdata($id,'<div class="alert alert-danger" role="alert">'.$msg.'</div>');
			break;
		case 'sucesso':
			$CI->session->set_flashdata($id,'<div class="alert alert-success" role="alert">'.$msg.'</div>');
			break;

	}

		return FALSE;
}
function getMsg($id){
	$CI =& get_instance();
	if ($CI->session->flashdata($id)) {
		echo $CI->session->flashdata($id);
	}
}
function errosValidacao(){
	if (validation_errors()) {
		echo '<div class="alert alert-danger" role="alert">'.validation_errors().'</div>';
	}
}


 function dataDiaDb()
{
	date_default_timezone_get(/*'America/Brasilia'*/);
	$formato = 'DATE_W3C';
	$hora = time();
	return standard_date($formato, $hora);
}
function dataDb()
{
	date_default_timezone_set('America/Sao_paulo');
	$stringdedata = "%Y-%m-%d";
	$data = time();
	$data = mdate($stringdedata, $data);
	return $data;
}

function formataDataDb($data)
{
	if ($data) {
		$data = explode("/", $data);
		$dia = $data[0];
		$mes = $data[1];
		$ano = $data[2];

		return $ano.'-'.$mes.'-'.$dia;
	}
}


function formataDataView($data = NULL){
	
	if ($data) {
		$data = explode("-", $data);
		$ano = $data[0];
		$mes = $data[1];
		$dia = $data[2];

		return $dia.'/'.$mes.'/'.$ano;
	}
}

function formataMoedaReal($valor= NULL, $real = FALSE){
	if ($valor) {
		$valor = ($real == TRUE ? 'R$ ' : '').number_format($valor, 2,',', '.');
		return $valor;
	}

}
function formatoDecimal($valor=NULL){
	$valor = str_replace('.', '', $valor);
	$val  = explode(",", $valor);//str_replace(',', '', $valor);
	return $val[0];
}
function formatoDecimalOk($valor=NULL){
	$valor = str_replace('.', '', $valor);
	$valor  = str_replace(',', '.', $valor);
	return $valor;
}
function slug($string=NULL){
	$string = remove_acentos($string);
	return url_title($string, '-', TRUE);
}

function remove_acentos($string=NULL){
	$procurar    = array('À','Á','Ã','Â','É','Ê','Í','Ó','Õ','Ô','Ú','Ü','Ç','à','á','ã','â','é','ê','í','ó','õ','ô','ú','ü','ç');
	$substituir  = array('a','a','a','a','e','r','i','o','o','o','u','u','c','a','a','a','a','e','e','i','o','o','o','u','u','c');
	return str_replace($procurar, $substituir, $string);
}

//PAGINAÇÂO
//cria o link da pagina
function paginacao($value='')
{
	
}
//erros xml

function display_xml_error($error, $xml)
{
    $return  = $xml[$error->line - 1] . "\n";
    $return .= str_repeat('-', $error->column) . "^\n";

    switch ($error->level) {
        case LIBXML_ERR_WARNING:
            $return .= "Warning $error->code: ";
            break;
         case LIBXML_ERR_ERROR:
            $return .= "Error $error->code: ";
            break;
        case LIBXML_ERR_FATAL:
            $return .= "Fatal Error $error->code: ";
            break;
    }

    $return .= trim($error->message) .
               "\n  Line: $error->line" .
               "\n  Column: $error->column";

    if ($error->file) {
        $return .= "\n  File: $error->file";
    }

    return "$return\n\n--------------------------------------------\n\n";
}


/*
Limita a quantidade de caracters exibido. Utilizado na descricao do produto
*/

function limita_caracteres($texto, $limite, $quebra = true){
   $tamanho = strlen($texto);
   if($tamanho <= $limite){ //Verifica se o tamanho do texto é menor ou igual ao limite
      $novo_texto = $texto;
   }else{ // Se o tamanho do texto for maior que o limite
      if($quebra == true){ // Verifica a opção de quebrar o texto
         $novo_texto = trim(substr($texto, 0, $limite))."...";
      }else{ // Se não, corta $texto na última palavra antes do limite
         $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
         $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."..."; // Corta o $texto até a posição localizada
      }
   }
   return $novo_texto; // Retorna o valor formatado
}

//update01
