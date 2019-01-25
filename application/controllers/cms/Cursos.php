<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cursos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Curso_model', 'curso');
	}

	// View que lista todos os cursos do sistema
	public function index() {
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca as infos e carrega a tela
		$data['cursos'] = $this->curso->buscaCursos();
		$this->load->view('cms/lista_cursos', $data);
	}

	// Abre a view para cadastrar um novo curso
	public function cadastraCurso () {
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca os professores para gerar as opções na view
		$this->load->model('Pessoa_model', 'pessoa');
		$data['professores'] = $this->pessoa->buscaProfessores();
		// Chama a view correta
		$this->load->view('cms/cadastrar_curso', $data);
	}

	// Cadastra um novo curso no banco de dados
	public function salvaCurso () {
		// Verificação de permissão
		if (!$this->temPermissao(2)) {
			return;
		}

		$curso['nome'] = $this->input->post('nome');
		$curso['professor_a'] = $this->input->post('professor_a');
		$curso['professor_b'] = $this->input->post('professor_b');
		$curso['ativo'] = $this->input->post('ativo');

		$this->curso->salvarCurso($curso);
		redirect(base_url('cms/cursos'));
	}

	// Abre o gerenciador de matriculas do curso
	public function matriculas ($id_curso = NULL) {
		// Verificação de permissão
		if(!$this->temPermissao(2)) {
			return;
		};
		// Busca o curso
		$data['curso'] = $this->curso->buscaCurso($id_curso);
		// Busca os alunos matriculados
		$data['matriculados'] = $this->curso->buscaAlunosCurso($id_curso);
		// Busca alunos não matriculados
		$data['nao_matriculados'] = $this->curso->buscaAlunosForaCurso($id_curso);
		// Chama a view
		$this->load->view('cms/matriculas', $data);
	}

	// Recebe os vetores da view com as matriculas e chama a função de salvar
	public function salvaMatriculas () {
		// Verificação de permissão
		if(!$this->temPermissao(2)) {
			return;
		}
		$matriculados = $this->input->post('matriculados[]');
		$id_curso = $this->input->post('id_curso');
		$this->curso->salvaMatriculas($matriculados, $id_curso);
		redirect(base_url('cms/cursos/matriculas/'.$id_curso));
		exit;
	}

	// Exclui um curso
	public function excluiCurso () {
		if(!$this->temPermissao(2)) {
			return;
		}
		$curso_id = $this->input->post('id');
		echo $this->curso->excluiCurso($curso_id);
	}

	// Abre a view para editar um curso
	public function editaCurso ($id_curso = NULL) {
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca o curso no banco
		$data['curso'] = $this->curso->buscaCurso($id_curso);
		// Busca os professores para gerar as opções na view
		$this->load->model('Pessoa_model', 'pessoa');
		$data['professores'] = $this->pessoa->buscaProfessores();
		// Chama a view
		$this->load->view('cms/editar_curso', $data);
	}

	// Salva as novas informações do curso
	public function atualizaCurso () {
		if (!$this->temPermissao(2)) {
			return;
		}
		$data['id'] = $this->input->post('id');
		$data['nome'] = $this->input->post('nome');
		$data['professor_a'] = $this->input->post('professor_a');
		$data['professor_b'] = $this->input->post('professor_b');
		$data['ativo'] = $this->input->post('ativo');
		if ($this->curso->alunoMatriculado($data['professor_a'], $data['id'])) {
			$this->curso->desmatriculaAluno($data['id'], $data['professor_a']);
		}
		if ($data['professor_b'] != "" && $this->curso->alunoMatriculado($data['professor_b'], $data['id'])) {
			$this->curso->desmatriculaAluno($data['id'], $data['professor_b']);
		}
		$this->curso->atualizaCurso($data);
		redirect(base_url('cms/cursos'));
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