<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa_model extends CI_Model {
	// PESSOA
	// Atualiza cadastro de pessoa (Opção disponível na tela de perfil de cada usuário)
	public function atualizaPessoa($pessoa = NULL) {
		$this->db->query("
			UPDATE Pessoa
			SET Nome = '".$pessoa['nome']."',
					Email = '".$pessoa['email']."',
					DataNascimento = '".$pessoa['data_nascimento']."',
					Sobre = '".$pessoa['sobre']."'
			WHERE ID = ".$this->session->id
		);
	}

	// Busca o nível de acesso e o ID através do email
	public function buscaNivelAcessoID($email = NULL) {
		// Faz a busca e retorna
		return $this->db->select("NivelAcesso, ID")->where('Email', $email)->get('Pessoa')->row();
	}

	// Busca informações da pessoa
	public function buscaPessoa ($id_pessoa = NULL) {
		$this->db->where('ID', $id_pessoa);
		return $this->db->get('Pessoa')->row();
	}

	// Busca todas as pessoas
	public function buscaPessoas ($id_pessoa = NULL) {
		return $this->db->get('Pessoa')->result();
	}

	// Exclui uma pessoa apagando a tupla e o upload. Retorna verdadeiro em caso de sucesso e falso em caso de falha
	public function excluiPessoa ($id_pessoa = NULL) {
		// Exclui a foto antes de remover do banco
		$foto = $this->db->select('Foto')->where('ID', $id_pessoa)->get('Pessoa')->row()->Foto;
		if(!empty($foto)) {
			if(!unlink(FCPATH.'assets/uploads/images/'.$foto)){
				return false;
			};
		}

		$this->db->reset_query();
		$this->db->where('ID', $id_pessoa);
		$this->db->delete('Pessoa');
		return true;
	}

	// Cria um novo usuário no bd (Opção disponível apenas para administradores)
	public function salvaPessoa ($pessoa = NULL) {
		$this->db->query("
			INSERT INTO Pessoa (Nome, Email, Senha, NivelAcesso)
			VALUES ('".$pessoa['nome']."', '".$pessoa['email']."', '".$pessoa['senha']."', ".$pessoa['nivel_acesso'].")
		");	

		// Envia um email para o novo usuário informando o novo cadastro junto com a senhah
	}

	// Busca a foto de uma pessoa com determinado ID
	public function buscaFoto ($id_pessoa = NULL) {
		// Faz a busca e retorna o endereço da foto
		return $this->db->select("Foto")->where('ID', $id_pessoa)->get('Pessoa')->row()->Foto;
	}

	// Altera o endereço da foto no banco
	public function alteraFoto($foto = NULL, $id_pessoa = NULL) {
		$this->db->query("
			UPDATE Pessoa
			SET Foto = '".$foto."'
			WHERE ID = ".$id_pessoa
		);
	}

	// Carrega a biblioteca do code, faz o upload e salva o caminho no banco
	public function uploadImagem($imagem = NULL) {
		// Configura a biblioteca de upload
		$config['upload_path'] = FCPATH.'assets/uploads/images';
		$config['allowed_types'] = "png|jpg|jpeg";
		$config['encrypt_name'] = TRUE;


		// Carrega a biblioteca
		$this->load->library("upload", $config);

		// Faz o upload do arquivo
		if ($this->upload->do_upload('foto_input')) {
			// Se existir, apaga o arquivo antigo
			$arquivo_antigo = $this->pessoa->buscaFoto($this->session->id);
			if (!empty($arquivo_antigo)) {
				if(!unlink(FCPATH.'assets/uploads/images/'.$arquivo_antigo)) {	
					return 'erro';
				}
			}

			// Cadastra o nome do novo arquivo no banco
			$info_arquivo = $this->upload->data();
			$nome_arquivo = $info_arquivo['file_name'];
			$this->pessoa->alteraFoto($nome_arquivo, $this->session->id);
			return $nome_arquivo;
		}
		else {
			return 'erro';
		}
	}

	// Salva nova senha no banco
	public function updatePassword ($email = NULL, $password = NULL) {
		$query = "UPDATE Pessoa SET Senha = ? WHERE Email = ?";
		return $this->db->query($query, array($password, $email));
	}

	// Param: Gera um link único para cada usuário que será utilizado para atualizar a senha
	public function geraTokenRecuperacaoSenha ($email = NULL) {
		$user = $this->db->where("Email", $email)->get("Pessoa")->row();
		if (!empty($user)) {
			$token = sha1($user->ID.$user->Senha);
			return $token;
		}
		else {
			return false;
		}
	}

	// PROFESSOR
	// Busca os cursos em que a pessoa é professor
	public function buscaCursosProfessor ($id_pessoa = NULL) {
		return $this->db->query("
			SELECT Nome, ID
			FROM Curso
			WHERE IDProfessorA = ".$id_pessoa." OR IDProfessorB = ".$id_pessoa
		)->result();
	}

	// Param: Quatidade de tuplas pra trazer do banco
	public function readLastTeatchers ($quantity = NULL) {
		// Faz a busca
		$query = "SELECT * FROM Pessoa WHERE NivelAcesso = 1 ORDER BY ID DESC LIMIT ?";
		return $this->db->query($query, array($quantity))->result();
	}

	// Busca os cursos em que a pessoa é o professor principal
	public function buscaCursosProfessorResponsavel ($id_pessoa = NULL) {
		return $this->db->query("
			SELECT Nome, ID
			FROM Curso
			WHERE IDProfessorA = ".$id_pessoa
		)->result();
	}

	// Busca todos os professores cadastrados
	public function buscaProfessores () {
		$this->db->select('ID, Nome, Email');
		$this->db->from('Pessoa');
		$this->db->where('NivelAcesso', 1);
		return $this->db->get()->result();
	}

	// Exclui o professor
	public function excluiProfessor ($id_professor = NULL) {
		// Verifica se o professor é o responsável por algum curso e se for retorna falso para que seja exibida a mensagem de que ele não pode ser excluido
		if (!empty($this->buscaCursosProfessorResponsavel($id_professor))) {
			return false;
		}

		// Exclui o professor
		$this->excluiPessoa($id_professor);
		return true;
	}

	// ALUNO
	// Busca os cursos em que a pessoa é aluno
	public function buscaCursosAluno ($id_pessoa = NULL) {
		return $this->db->query("
			SELECT Curso.Nome AS curso_nome, Curso.ID AS curso_ID, Pessoa.Nome AS professor_a_nome
			FROM Curso
			JOIN AlunoCurso ON Curso.ID = AlunoCurso.IDCurso
			JOIN Pessoa ON Curso.IDProfessorA = Pessoa.ID
			WHERE AlunoCurso.IDPessoa = ".$id_pessoa
		)->result();
	}

	// Busca todos os alunos cadastrados
	public function buscaAlunos () {
		$this->db->select('ID, Nome, Email');
		$this->db->from('Pessoa');
		$this->db->where('NivelAcesso', 0);
		return $this->db->get()->result();
	}

	// Altera o nível de acesso de um aluno
	public function tornaAlunoProfessor ($id_aluno = NULL) {
		$this->db->query("
			UPDATE Pessoa
			SET NivelAcesso = 1
			WHERE ID = ".$id_aluno
		);
	}

	// VALIDAÇÕES
	// Busca o email no banco e retorna se ele está cadastrado ou não
	public function existeEmail ($email = NULL) {
		$this->db->where("Email", $email);
		$find = $this->db->get('Pessoa')->row();
		if (empty($find)) {
			return false;
		}
		else {
			return true;
		}
	}

	// CORPO ADMINISTRATIVO
	//retorna todas as tuplas do Corpo Administrativo com seus respectivos cargos
	public function buscaCA (){
		return $this->db->get("CorpoAdministrativo")->row();
	}

	// Atualiza o corpo administrativo
	public function updateCA($CorpoAdministrativo = NULL){
		return $this->db->query("
			UPDATE CorpoAdministrativo
			SET Presidente = '".$CorpoAdministrativo['presidente']."',
				VicePresidente = '".$CorpoAdministrativo['vice-presidente']."',
				Marketing = '".$CorpoAdministrativo['diretoria_marketing']."',
				Financeiro = '".$CorpoAdministrativo['diretoria_financeiro']."',
				RelacoesExternas = '".$CorpoAdministrativo['relacoes_externas']."',
				RH = '".$CorpoAdministrativo['recursos_humanos']."',
				Academica = '".$CorpoAdministrativo['diretoria_academica']."'"
		);
	}

	// Verifica se o email não é utilizado por outra pessoa, para isso, busca o email em todas as outras pessoas exceto a dona original
	public function emailDisponivel ($email = NULL, $id_pessoa = NULL) {
		$this->db->where("Email", $email);
		$this->db->where("ID !=", $id_pessoa);
		if(empty($this->db->get('Pessoa')->row())) {
			return true;
		}
		else {
			return false;
		}
	}

	// Verifica se o email inserido é um email válido
	public function emailValido($email = NULL) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  return true;
		}
		else {
			return false;
		}
	}

	// LOGIN
	// Verifica se a senha do usuário está correta
	public function senhaCorreta ($email = NULL, $senha = NULL) {
		$correct = $this->db->where('Email', $email)->where('Senha', $senha)->get('Pessoa')->row();
		if (!empty($correct)) {
			return true;
		}
		else {
			return false;
		}
	}

	// Faz o login
	public function loga ($email = NULL) {
		// Busca o nível de acesso e ID da pessoa
		$infos = $this->buscaNivelAcessoID($email);
		$this->session->email = $email;
		$this->session->id = $infos->ID;
		$this->session->nivel_acesso = $infos->NivelAcesso;
		$this->session->logado = true;
	}
}
?>