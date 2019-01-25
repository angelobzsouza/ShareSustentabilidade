<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// NÍVEIS DE ACESSO
// ADMINISTRADOR = 2
// PROFESSOR = 1
// ALUNO = 0

class Pessoas extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Pessoa_model', 'pessoa');
	}

	public function index() {
		redirect(base_url('welcome'));
	}

	// CRUD INDEPENDENTE DE NÍVEL DE ACESSO
	// Cria um novo usuário no banco de dados
	public function salvaPessoa () {
		$this->load->helper("string");
		// Recebe as variáveis
		$data['nivel_acesso'] = $this->input->post('nivel_acesso');
		$data['nome']= $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$senha_temporaria = random_string('alnum', 10);
		$data['senha'] = sha1($senha_temporaria);

		// Salva e redireciona
		$this->pessoa->salvaPessoa($data);

		// Envia email de notificação
		$config['charset'] = 'utf-8';
		$this->email->initialize($config);
		$this->email->from('contato@shareinstituto.com.br', 'Share - Centro de Línguas');
		$this->email->to($data['email']);
		$this->email->subject('Bem Vindo!');
		$this->email->message("Olá ".$data['nome'].", você acaba de ser cadastrado na plataforma da Share Centro de Línguas.\nPara acessar a plataforma utilze as seguintes credenciais\n\nSeu login é: ".$data['email']."\nSua senha é: ".$senha_temporaria."\n\nAcesse nossa plataforma e finalize o preenchimento de seu pefil. Até logo!");
		$this->email->send();

		if ($data['nivel_acesso'] == 1) {
			redirect(base_url('cms/pessoas/professores'));
		}
		else if ($data['nivel_acesso'] == 0) {
			redirect(base_url('cms/pessoas/alunos'));
		}
	}

	// CRUD PROFESSORES
	// Lista todos os professores da plataforma na view
	public function professores () {
		// Verifica permissões
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca as infos e carrega a tela
		$data['professores'] = $this->pessoa->buscaProfessores();
		$this->load->view('cms/lista_professores', $data);
	}

	// Abre a view para cadastrar um novo professor
	public function cadastraProfessor () {
		if(!$this->temPermissao(2)){
			return;
		};
		// Chama a view correta
		$this->load->view('cms/cadastrar_professor');
	}

	// Verifica se o professor não é o responsável por algum curso e o exlcui
	public function excluiProfessor () {
		// Tenta excluir o professor e retorna o resultado
		echo $this->pessoa->excluiProfessor($this->input->post('id'));
	}

	//CURD ALUNO
	// Lista todos os alunos da plataforma na view
	public function alunos () {
		// Verifica permissões
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca as infos e carrega a tela
		$data['alunos'] = $this->pessoa->buscaAlunos();
		$this->load->view('cms/lista_alunos', $data);
	}

	// Chama a view para cadastrar um aluno
	public function cadastraAluno () {
		if(!$this->temPermissao(2)){
			return;
		};
		// Chama a view correta
		$this->load->view('cms/cadastrar_aluno');
	}

	public function excluiAluno () {
		if(!$this->temPermissao(2)){
			echo 0;
		};
		// Exclui o aluno
		echo $this->pessoa->excluiPessoa($this->input->post('id'));
	}

	public function tornaAlunoProfessor () {
		if(!$this->temPermissao(2)){
			echo 0;
		};
		// Muda o nível de acesso de um aluno
		$this->pessoa->tornaAlunoProfessor($this->input->post('id'));
	}

	// CRUD CORPO ADMINISTRATIVO
	// View para edição do corpo admnistrativo
	public function updateCAView() {
		if(!$this->temPermissao(2)){
			return;
		};
		// Busca as infos e chama a view
		$data['cargos'] = $this->pessoa->buscaCA();
		$data['pessoas'] = $this->pessoa->buscaPessoas();
		$this->load->view('cms/editar_corpo_administrativo', $data);
	}

	//edita o corpo administrativo
	public function updateCA() {
		if(!$this->temPermissao(2)){
			return;
		};
		$data['presidente'] = $this->input->post('presidente');
		$data['vice-presidente'] = $this->input->post('vice-presidente');
		$data['diretoria_marketing'] = $this->input->post('diretoria_marketing');
		$data['diretoria_financeiro'] = $this->input->post('diretoria_financeiro');
		$data['relacoes_externas'] = $this->input->post('relacoes_externas');
		$data['recursos_humanos'] = $this->input->post('recursos_humanos');
		$data['diretoria_academica'] = $this->input->post('diretoria_academica');
		$this->pessoa->updateCA($data);
		redirect(base_url('cms/WelcomeCMS'));
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