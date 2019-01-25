<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image_model extends CI_Model {
		// Carrega e configura a biblioteca, faz o upload e em caso de sucesso exlui o arquivo antigo ou em caso de falha retorna false
	public function upload($table = NULL, $image_column = NULL, $row_id = -1) {
		// Configura a biblioteca de upload
		$config['upload_path'] = FCPATH.'assets/uploads/images';
		$config['allowed_types'] = "png|jpg|jpeg";
		$config['encrypt_name'] = TRUE;


		// Carrega a biblioteca
		$this->load->library("upload", $config);

		// Faz o upload do arquivo
		if ($this->upload->do_upload('foto_input')) {
			// Se for atualização apaga o arquivo antigo
			$arquivo_antigo = @$this->db->query("SELECT ".$image_column." FROM ".$table." WHERE ID = ".$row_id)->row()->$image_column;
			if (!empty($arquivo_antigo)) {
				// Tenta exluir e caso não consiga retorna erro
				if(!unlink(FCPATH.'assets/uploads/images/'.$arquivo_antigo)) {	
					return false;
				}
			}

			// Retorna o nome do arquivo
			$info_arquivo = $this->upload->data();
			$nome_arquivo = $info_arquivo['file_name'];
			return $nome_arquivo;
		}
		else {
			return false;
		}
	}
	public function updateName ($table = NULL, $image_column = NULL, $row_id = -1, $image_name = NULL) {
		return $this->db->query("
			UPDATE ".$table."
			SET ".$image_column." = '".$image_name."'
			WHERE ID = ".$row_id
		);
	}

	public function delete ($table = NULL, $image_column = NULL, $row_id = -1) {
		$file_name = $this->db->where('ID', $row_id)->get($table)->row()->$image_column;
		// Try to delete file 
		if(unlink(FCPATH.'assets/uploads/images/'.$file_name)) {	
			return true;
		}
		else {
			return false;
		}
	}
}
?>