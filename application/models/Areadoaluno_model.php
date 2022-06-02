<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Areadoaluno_model extends CI_Model
{
	public function getInfoUsuario(){
		$this->db->where('id',1);
		$this->db->limit(1);
		$query = $this->db->get('config');
		return $query->row();
	}
}
