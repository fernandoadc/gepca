<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Submissao_model extends CI_Model
{
	public function getSubmissoes(){
	    return $this->db->get('submissoes')->result();
	}
	public function doInsert($dadosTrabalhos=NULL){
		if (is_array($dadosTrabalhos)) {
			$this->db->insert('submissoes',$dadosTrabalhos);
			if ($this->db->affected_rows()>0) {
				setMsg('msgCadastro','Cadastrado com sucesso!', 'sucesso');
			}else{
				setMsg('msgCadastro','Erro ao cadastrar.', 'erro');
			}

		}else{

			return FALSE;

		}

	}

	public function getSubmetido($id=null){
		if ($id) {
			$this->db->where('id_user', $id);
			$this->db->limit(1);
			$query = $this->db->get('submissoes');
			return $query->row();
		}else{
			return null;
		}
	}
	
}
