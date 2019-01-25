<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conteudo_model extends CI_Model {
	// CURD
	// Param: Quatidade de tuplas pra trazer do banco
	public function readLastOnes ($quantity = NULL) {
		// Faz a busca
		$query = "SELECT * FROM Conteudo ORDER BY ID DESC LIMIT ?";
		return $this->db->query($query, array($quantity))->result();
	}

	// Param: ID do conteudo
	// Return: Conteudo
	public function read ($conteudo_id = NULL) {
		// Busca
		return $this->db->where("ID", $conteudo_id)->get('Conteudo')->row();
	}

	// Returan: An array with all site content
	public function readAll () {
		// Busca
		return $this->db->get('Conteudo')->result();
	}
	
	// Salva as infos de conteudo no bd
	public function salvaConteudo($nome = NULL, $descricao = NULL, $curso = NULL, $nome_arquivo = NULL) {
		$this->db->query("
			INSERT INTO Conteudo (Nome, Descricao, Link, IDCurso)
			VALUES ('".$nome."', '".$descricao."', '".$nome_arquivo."', ".$curso.")
		");
	}

	// Exclui o arquivo e as infos no banco, retorna true ou false como resultado
	public function excluiConteudo($conteudo = NULL) {
		if(unlink(FCPATH.'assets/uploads/files/'.$conteudo['nome_arquivo'])) {
			$this->db->where('ID', $conteudo['id']);
			$this->db->delete('Conteudo');
			return true;
		}
		else {
			return false;
		}
	}

	// Faz o upload de um arquivo e salva as infos no bando. True ou false como resultado
	public function upload ($data) {
		// Configura a biblioteca de upload
		$config['upload_path'] = FCPATH.'assets/uploads/files';
		$config['allowed_types'] = "pdf|zip|docx|ppt|jpg|jpeg|mp3|mp4|png|xslx";
		$config['encrypt_name'] = TRUE;


		// Carrega a biblioteca
		$this->load->library("upload", $config);

		// Faz o upload do arquivo
		if ($this->upload->do_upload('arquivo')) {
			$info_arquivo = $this->upload->data();
			$nome_arquivo = $info_arquivo['file_name'];
			$this->salvaConteudo($data['nome'], $data['descricao'], $data['curso_id'], $nome_arquivo);
			return true;
		}
		else {
			return false;
		}
	}
}
?>