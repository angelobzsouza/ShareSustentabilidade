<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso_model extends CI_Model {
	// CRUD
	// Param: Course's numbers to read
	// Return: An array with last coureses
	// Busca todas as infos de curso
	public function readLastOnes ($quantity = NULL) {
		// Faz a busca
		$query = "SELECT * FROM Curso ORDER BY ID DESC LIMIT ?";
		return $this->db->query($query, array($quantity))->result();
	}
	public function buscaCurso ($curso_id = NULL) {
		return $this->db->query("
			SELECT * FROM Curso WHERE Curso.ID = ".$curso_id
		)->row();
	}

	// Busca os cursos cadastrados no banco
	public function buscaCursos () {
		$this->db->select("Curso.Nome, Curso.ID, Pessoa.Nome AS Professor");
		$this->db->from("Curso");
		$this->db->join("Pessoa", "Curso.IDProfessorA = Pessoa.ID");
		return $this->db->get()->result();
	}

	// Salva um novo curso no bd
	public function salvarCurso($curso = NULL) {
		// Trata o professor B para salvar NULL no banco caso necessário
		if ($curso['professor_b'] == "") {
			$curso['professor_b'] = NULL;
		}
		if(empty($curso['professor_b'])) {
			$this->db->query("
				INSERT INTO Curso (Nome, IDProfessorA, IDProfessorB, Ativo)
				VALUES ('".$curso['nome']."', ".$curso['professor_a'].", NULL, ".$curso['ativo'].")
			");
			return;
		}
		$this->db->query("
			INSERT INTO Curso (Nome, IDProfessorA, IDProfessorB, Ativo)
			VALUES ('".$curso['nome']."', ".$curso['professor_a'].", ".$curso['professor_b'].", ".$curso['ativo'].")
		");
	}

	// Atualiza as informações de um curso
	public function atualizaCurso ($curso = NULL) {
		// Trata o professor B para salvar NULL no banco caso necessário
		if ($curso['professor_b'] == "") {
			$curso['professor_b'] = NULL;
		}
		if(empty($curso['professor_b'])) {
			$this->db->query("
				UPDATE Curso
				SET Nome = '".$curso['nome']."',
						IDProfessorA = '".$curso['professor_a']."',
						IDProfessorB = NULL,
						Ativo = ".$curso['ativo']."
				WHERE ID = ".$curso['id']
			);
		}
		else {
			$this->db->query("
				UPDATE Curso
				SET Nome = '".$curso['nome']."',
						IDProfessorA = '".$curso['professor_a']."',
						IDProfessorB = '".$curso['professor_b']."',
						Ativo = ".$curso['ativo']."
				WHERE ID = ".$curso['id']
			);
		}
	}

	// Exclui um curso e todo conteudo atrelado a ele
	public function excluiCurso ($curso_id = NULL) {
		$conteudos = $this->buscaConteudoCurso($curso_id);
		foreach ($conteudos as $conteudo) {
			if(!unlink(FCPATH.'assets/uploads/files/'.$conteudo->link)){
				return false;
			};
		}
		$this->db->where('ID', $curso_id);
		$this->db->delete('Curso');
		return true;
	}

	// PROFESSORES
	// Busca os professores do curso
	public function buscaProfessoresCurso ($curso_id = NULL) {
		// Pega o primeiro professor
		$professores['professor_a'] = $this->db->query("
			SELECT Pessoa.Nome, Curso.IDProfessorA AS professor_a_id
			FROM Pessoa
			JOIN Curso ON Curso.IDProfessorA = Pessoa.ID
			WHERE Curso.ID = ".$curso_id
		)->row();

		$this->db->reset_query();

		// Pega o segundo professor
		$professores['professor_b'] = $this->db->query("
			SELECT Pessoa.Nome, Curso.IDProfessorB AS professor_b_id
			FROM Pessoa
			JOIN Curso ON Curso.IDProfessorB = Pessoa.ID
			WHERE Curso.ID = ".$curso_id
		)->row();

		// Trata a possibilida de não haver professor b
		if (empty($professores['professor_b'])) {
			$professores['professor_b'] = (object) array ('professor_b_id' => NULL);
		}

		return $professores;
	}

	// ALUNOS
	// Busca o aluno no curso, verifica se o mesmo está matriculado
	public function alunoMatriculado ($aluno_id = NULL, $curso_id) {
		$encontrou = $this->db->query("
			SELECT *
			FROM AlunoCurso
			WHERE IDCurso = ".$curso_id." AND IDPessoa = ".$aluno_id
		)->row();
		if (empty($encontrou)) {
			return false;
		}
		else {
			return true;
		}
	}

	//Param: id do curso e do aluno
 	//Return: Bool
 	public function desmatriculaAluno ($curso_id = NULL, $aluno_id = NULL) {
 		$query = "DELETE FROM AlunoCurso WHERE IDCurso = ? AND IDPessoa = ?";
 		return $this->db->query($query, array($curso_id, $aluno_id));
 	} 

	// Busca todos os alunos inscritos no curso
	public function buscaAlunosCurso ($curso_id = NULL) {
		return $this->db->query("
			SELECT Pessoa.Nome AS nome, Pessoa.Email AS email, Pessoa.ID AS ID
			FROM Pessoa
			JOIN AlunoCurso ON Pessoa.ID = AlunoCurso.IDPessoa
			WHERE AlunoCurso.IDCurso = ".$curso_id
		)->result();
	}

	// Busca os alunos que não estão matriculados no curso
	public function buscaAlunosForaCurso ($curso_id = NULL) {
		return $this->db->query("
			SELECT Pessoa.ID AS ID, Pessoa.Nome AS Nome, Pessoa.Email  
			FROM Pessoa 
			WHERE Pessoa.ID NOT IN (
				SELECT p.ID 
				FROM (
					SELECT IDPessoa 
					FROM AlunoCurso ac 
					WHERE ac.IDCurso = ".$curso_id."
				)
				ac 
				INNER JOIN Pessoa p ON ac.IDPessoa = p.ID
			)
		")->result();
	}

	// Remove todas as metriculas deste curso salvas no banco e insere os novos vetoress
	public function salvaMatriculas ($matriculados = NULL, $id_curso = NULL) {
		$this->db->where("IDCurso", $id_curso);
		$this->db->delete('AlunoCurso');
		// Inserção
		foreach($matriculados as $id_aluno) {
			$data = [
				'IDPessoa' => $id_aluno,
				'IDCurso' => $id_curso
			];
			$this->db->insert('AlunoCurso', $data);
		};
	}

	// CONTEUDOS
	// Busca o conteudo de um curso específico
	public function buscaConteudoCurso ($curso_id = NULL) {
		return $this->db->query("
			SELECT Conteudo.Link AS link, Conteudo.Nome AS conteudo_nome, Conteudo.ID AS ID
			FROM Conteudo
			WHERE Conteudo.IDCurso = ".$curso_id
		)->result();
	}
}
?>