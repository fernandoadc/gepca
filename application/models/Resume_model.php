<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume_model extends CI_Model
{
	public function getMinicursos(){
	    return $this->db->get('resume')->result();
	}
	public function getMinicurso($id=NULL){
		if ($id) {
			$this->db->where('id', $id);
			$this->db->limit(1);
			$query = $this->db->get('resume');
			return $query->row();
		}else{
			setMsg('msgCadastro', 'Minicurso ou palestra não encontrado!', 'erro');
			return NULL;
		}
	}
	public function doUpdate($dadosResume=null, $id=null ){
		if (is_array($dadosResume) && $id != NULL) {

			$this->db->where('id',$id);
			$this->db->update('resume', $dadosResume);

			if ( $this->db->affected_rows() >0) {
				setMsg('msgCadastro','Atualização realizada com sucesso!','sucesso');
			}else{
				setMsg('msgCadastro','Erro ao realizar a atualização, tente novamente!','erro');

			}
		}
	}
	public function doInsert($dadosResume=NULL){
		if (is_array($dadosResume)) {
			$this->db->insert('resume',$dadosResume);
			if ($this->db->affected_rows()>0) {
				setMsg('msgCadastro','Cadastrado com sucesso!', 'sucesso');
			}else{
				setMsg('msgCadastro','Erro ao cadastrar.', 'erro');
			}

		}else{

			return FALSE;

		}

	}
	public function deleteMinicurso($id=null){
	    $this->db->where('id',$id);
	$this->db->delete('palestras_minicursos');
			if ( $this->db->affected_rows() >0) {
				setMsg('msgCadastro','Apagado com sucesso!','sucesso');
			}else{
				setMsg('msgCadastro','Erro ao apagar, tente novamente!','erro');
			}
	}
	public function getSomenteMinicursos(){
	    $this->db->where('tipo_atividade','Minicurso');
			return  $this->db->get('palestras_minicursos')->result();
	}
	public function getSomentePalestras(){
	      $this->db->where('tipo_atividade','Palestra');
		return  $this->db->get('palestras_minicursos')->result();
	}
	public function doInsertPagamento($dados_pagamento=NULL){

			if (is_array($dados_pagamento)) {
			$this->db->insert('pagamento',$dados_pagamento);
			if ($this->db->affected_rows()>0) {
				setMsg('msgCadastro','Cadastrado com sucesso!', 'sucesso');
			}else{
				setMsg('msgCadastro','Erro ao cadastrar.', 'erro');
			}

		}else{

			return FALSE;

		}

	}
}
