<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulario_model extends CI_Model {
	// Param: Infos resposta do forms professor
	// Return: bool
	public function salvaRespostaProfessor ($respostas) {
		// Faz a isnerção
		return $this->db->insert("FormProfessor", $respostas);
	}
}
?>