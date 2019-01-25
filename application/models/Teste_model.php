<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste_model extends CI_Model {

	// CRUD
	// Busca todas as infos de curso
	public function read ($teste_id = NULL) {
		return $this->db->query("
			SELECT * FROM Teste WHERE Teste.ID = ".$teste_id
		)->row();
	}

	// Busca os testes cadastrados no banco
	public function readAll () {
		// Faz a busca
		return $this->db->get('Teste')->result();
	}

	// Busca os testes cadastrados no banco
	public function readAllActive () {
		// Faz a busca
		return $this->db->where("Ativo", 1)->get('Teste')->result();
	}

	// Salva novo teste
	public function store ($teste = NULL) {
		$query = "INSERT INTO Teste (Nome, Ativo, QuantidadeQuestoes)
							VALUES (?, ?, ?)";
		return $this->db->query($query, array($teste['nome'], $teste['ativo'], $teste['qtde_questoes']));
	}

	public function update ($teste = NULL) {
		$query = "
			UPDATE Teste
			SET Nome = ?,
					Ativo = ?,
					QuantidadeQuestoes = ?
			WHERE ID = ?";
		return $this->db->query($query, array(
			$teste['Nome'],
			$teste['Ativo'],
			$teste['QuantidadeQuestoes'],
			$teste['ID'],
		));
	}

	public function delete ($teste_id = NULL) {
		// Delete
		return $this->db->where('ID', $teste_id)->delete('Teste');
	}

	// QUESTÕES
	// Busca as questões de um teste para gerenciar
	public function readAllQuestions ($teste_id = NULL) {
		// Faz a busca
		return $this->db->where('IDTeste', $teste_id)->get('Questao')->result();
	}

	public function readQuestoesLimite ($teste_id = NULL, $qtd_questions = NULL) {
		// Faz a busca
		$query = "SELECT * 
							FROM Questao 
							WHERE IDTeste = ? 
							ORDER BY RAND() 
							LIMIT ?";
		return $this->db->query($query, array($teste_id, intval($qtd_questions)))->result();
	}

	// Salva questão no banco
	public function storeQuestao ($questao = NULL) {
		// Salva a questão
		return $this->db->insert("Questao", $questao);
	}

	// Param: id da questão
	public function deleteQuestao ($questao_id = NULL) {
		// Delete
		return $this->db->where('ID', $questao_id)->delete('Questao');
	}

	// EXECUÇÃO
	// Calcula o resultado e armazena ele no banco
	// Param: Vetor com o id da questão e a resposta que o usuário selecionou, quantidade de questões respondidas, nome e email do usuário
	// Return: Bool
	public function calculaResultado ($respostas = NULL, $qtd_questions = NULL, $nome = NULL, $email = NULL) {
		// Soma a quantidade de respostas certas
		$respostas_certas = 0;
		foreach ($respostas as $resposta) {
			if ($resposta->resposta == $this->db->where('ID', $resposta->questao_id)->get('Questao')->row()->Resposta) {
				$respostas_certas++;
			}
		}
		$resultado = $respostas_certas/$qtd_questions;
		$teste_id = $this->db->where('ID', $respostas[0]->questao_id)->get('Questao')->row()->IDTeste;

		// Monta a query para salvar no banco
		$query = "INSERT INTO TesteResultado (IDTeste, Nome, Email, Resultado, SalvoEm) VALUES (?, ?, ?, ?, NOW())";
		return $this->db->query($query, array($teste_id, $nome, $email, $resultado));
	}

	// RESULTADOS
	// Param: ID do teste
	// Return: resposta da query
	public function readTestResults ($teste_id = NULL) {
		// Faz a busca
		return $this->db->where("IDTeste", $teste_id)->get("TesteResultado")->result();
	}

	// Param: id do resultado
	public function deleteResult ($resultado_id = NULL) {
		// Delete
		return $this->db->where('ID', $resultado_id)->delete('TesteResultado');
	}
}
?>