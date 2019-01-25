<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticia_model extends CI_Model {
	// CRUD
	// Busca as noticias no banco
	public function buscaNoticias () {
		$this->db->order_by("SalvoEm", "ASC");
		return $this->db->get('Noticia')->result();
	}

	// Busca as notícias de acordo com a paginação 
	public function buscaNoticiasPaginadas ($offset = NULL) {
		$this->db->limit(12, $offset)->order_by("SalvoEm", "DESC");
		return $this->db->get('Noticia')->result();
	}

	// Busca todos os campos de uma notícia no banco pelo ID
	public function buscaNoticia ($noticia_id = NULL) {
		// Retrona a notícia
		return $this->db->where('ID', $noticia_id)->get('Noticia')->row();
	}

	// Param: Quatidade de tuplas pra trazer do banco
	public function readLastOnes ($quantity = NULL) {
		// Faz a busca
		$query = "SELECT * FROM Noticia ORDER BY ID DESC LIMIT ?";
		return $this->db->query($query, array($quantity))->result();
	}

	public function create ($noticia = NULL) {
		return $this->db->query("
			INSERT INTO Noticia (ID, Titulo, Previa, Texto, Foto, SalvoEm)
			VALUES (default, '".$noticia['titulo']."', '".$noticia['previa']."', '".$noticia['texto']."', '".$noticia['foto']."', NOW())
		");
	}

	public function update ($noticia = NULL) {
		return $this->db->query("
			UPDATE Noticia
			SET Titulo = '".$noticia['titulo']."',
					Previa = '".$noticia['previa']."',
					Texto = '".$noticia['texto']."',
					SalvoEm = NOW()
			WHERE ID = ".$noticia['noticia_id']
		);
	}

	public function delete ($noticia_id = NULL) {
		// Delete the notice row
		$this->db->where('ID', $noticia_id);
		return $this->db->delete('Noticia');
	}

	public function contaNoticias () {
		return $this->db->count_all("Noticia");
	}
}
?>