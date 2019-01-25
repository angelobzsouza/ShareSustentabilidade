<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Curso_model', 'curso');
	}

	// Caso o usuário tenta acessar o controller sem especificar a função, redireciona para a tela de aprendizado
	public function index() {
		redirect(base_url('pessoas/aprender'));
	}

	// Abre a view do curso (Há bastante informação para carregar sobre um curso, por isso a função é grande)
	public function curso ($curso_id = NULL) {
		// Trata o erro quando o id está vazio
		if(empty($curso_id)) {
			$this->load->view('errors/erros_share/erro_geral');
			return;
		}
		// Verfica se o usuário está logado, caso contrário abre a página de login
		if (!$this->temPermissao()) {
			return;
		}

		// Verifica se o usuário é um aluno desse curso e carrega a view
		if ($this->curso->alunoMatriculado($this->session->id, $curso_id)) {
			// Busca infos do curso
			$data['conteudos'] = $this->curso->buscaConteudoCurso($curso_id);
			$data['professores'] = $this->curso->buscaProfessoresCurso($curso_id);
			$data['alunos'] = $this->curso->buscaAlunosCurso($curso_id);
			$data['curso'] = $this->curso->buscaCurso($curso_id);

			//Carrega a view
			$this->load->view('curso', $data);
			return;
		}
		// Verifica se é o professor
		$professores = $this->curso->buscaProfessoresCurso($curso_id);
		if ($professores['professor_a']->professor_a_id == $this->session->id || $professores['professor_b']->professor_b_id == $this->session->id) {
			// Busca infos do curso
			$data['conteudos'] = $this->curso->buscaConteudoCurso($curso_id);
			$data['professores'] = $this->curso->buscaProfessoresCurso($curso_id);
			$data['alunos'] = $this->curso->buscaAlunosCurso($curso_id);
			$data['curso'] = $this->curso->buscaCurso($curso_id);
			$data['e_professor'] = true;

			//Carrega a view
			$this->load->view('curso', $data);
			return;
		}

		// Mostra a view do acesso negado
		$this->load->view('errors/erros_share/erro_403');
	}

	// PERMISSÕES
	// Faz as verificações necessárias para abrir uma página que são: varificar se esta logado e se tem permissão.
	private function temPermissao ($nivel_acesso = NULL) {
		if (!$this->session->logado) {
			$this->load->view('login');
			return false;
		}
		else if (!empty($nivel_acesso) && $nivel_acesso != $this->session->nivel_acesso) {
			$this->load->view('errors/erros_share/erro_403');
			return false;
		}
		else {
			return true;
		}
	}
}