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

	// EDIÇÕES DE PERFIL
	// Salva as informações que o usuário digitar sobre si
	public function editaPessoa () {
		$data['nome'] = $this->input->post('nome');
		$data['email'] = $this->input->post('email');
		$data['data_nascimento'] = $this->input->post('data_nascimento');
		$data['sobre'] = $this->input->post('sobre');

		// Valida email
		if (!$this->pessoa->emailValido($data['email'])) {
			echo 'erro';
			return;
		}
		// Verifica se o email não está cadastrado para outra pessoa
		if (!$this->pessoa->emailDisponivel($data['email'], $this->session->id)) {
			echo 'email_cadastrado';
			return;
		}
		// Atualiza no banco e retorna o sucesso
		$this->pessoa->atualizaPessoa($data);
		echo 'salvou';
		return;
	}

	// Altera a foto de perfil de qualquer pessoa
	public function alteraFotoPerfil () {
			// Recebe o arquivo e faz o upload
			$imagem = $_FILES['foto_input'];
			echo $this->pessoa->uploadImagem($imagem);
			return;
	}

	// EDIÇÃO DE SENHA
	// Altera a senha do usuário através da página de perfil
	public function updatePasswordSite () {
		// Recebe as infos por post
		$senha_atual = sha1($this->input->post('senha_atual'));
		$nova_senha = sha1($this->input->post('nova_senha'));
		$email = $this->session->email;

		// Verifica se a senha está correta
		if (!$this->pessoa->senhaCorreta($email, $senha_atual)) {
			echo 2;
			return;
		}

		// Altera a senha
		echo $this->pessoa->updatePassword($email, $nova_senha);
	}

	// Param: Email para enviar o link
	// Return: index do site
	public function enviaEmailSenha () {
		// Gera link de recuperação
		$token = $this->pessoa->geraTokenRecuperacaoSenha($this->input->post('email_senha'));
		$link = base_url('pessoas/updatePasswordEmailView/'.$token);

		// Veririca se o email foi encontrado
		if (!$token) {
			$this->load->view('errors/erros_share/erro_geral');
			return;
		}
		// Se foi, envia email
		else {
			// Envia email de notificação
			$config['charset'] = 'utf-8';
			$this->email->initialize($config);
			$this->email->from('contato@shareinstituto.com.br', 'Share - Centro de Línguas');
			$this->email->to($this->input->post('email_senha'));
			$this->email->subject('Recuperação de senha');
			$this->email->message("Você solicitou a recuperação de senha para a sua conta, para realiza-la clique no link abaixo:\n\n".$link."\n\nSe você não fez essa solicitação, desconsidere este email.\n\nAtt: Equipe Share");
			$this->email->send();
			redirect(base_url());
		}
	}

	public function updatePasswordEmailView ($token = NULL) {
		$data['token'] = $token;
		$this->load->view('recuperar_senha', $data);
	}

	// Param: token para recuperação de senha por get
	// Reutrn: Página do perfil após fazer o login
	public function updatePasswordEmail () {
		$token = $this->input->post('token');
		$nova_senha = sha1($this->input->post('senha'));
		$email = $this->input->post('email');

		if ($token == $this->pessoa->geraTokenRecuperacaoSenha($email)) {
			$this->pessoa->updatePassword($email, $nova_senha);
			$this->pessoa->loga($email);
			redirect(base_url('welcome/perfil'));
		}
		else {
			$this->load->view('errors/erros_share/erro_geral');
			return;
		}
	}

	// LOGIN
	// Valida o email e busca no banco para ver se ele está cadastrado
	public function existeEmail () {
		$email = $_POST['email'];
		if (!$this->pessoa->emailValido($email)) {
			echo false;
			return;
		}
		$resposta = $this->pessoa->existeEmail($email);
		echo $resposta;
	}

	// Verifica se a senha está correta para fazer o login
	public function verificaSenha () {
		$senha = sha1($_POST['senha']);
		$email = $_POST['email'];
		echo $this->pessoa->senhaCorreta($email, $senha);		
	}

	// Login comum
	public function loga () {
		// Se o usuário acessar pela url, redireciona pro welcome
		if ($this->session->logado) {
			redirect(base_url('welcome'));
		}
		// Faz o login
		$this->pessoa->loga($this->input->post('email'));
		redirect(base_url('welcome'));
	}

	// Deslogar
	public function desloga () {
		$this->session->sess_destroy();
		redirect(base_url());; 
	}

	// CURSOS
	// Carrega os cursos em que o usário é aluno e os exibe na tela
	public function aprender () {
		// Para acessar esta tela é necessário estar logado
		if(!$this->temPermissao()) {
			return;
		}
		// Busca os cursos do aluno e abre a view
		$data['cursos'] = $this->pessoa->buscaCursosAluno($this->session->id);
		$this->load->view('aprender', $data);
	}

	// Carrega os cursos em que o usário é professor e os exibe na tela
	public function ensinar () {
		// Para acessar esta tela é necessário estar logado
		if(!$this->temPermissao(1)) {
			return;
		}
		// Busca os cursos do professor e abre a view
		$data['cursos'] = $this->pessoa->buscaCursosProfessor($this->session->id);
		$this->load->view('ensinar', $data);
	}

	// PERMISSÕES
	// Faz as verificações necessárias para abrir uma página que são: varificar se esta logado e se tem permissão.
	private function temPermissao ($nivel_acesso = NULL) {
		if (!$this->session->logado) {
			$this->load->view('login');
			return false;
		}
		else if (!empty($nivel_acesso) && $nivel_acesso > $this->session->nivel_acesso) {
			$this->load->view('errors/erros_share/erro_403');
			return false;
		}
		else {
			return true;
		}
	}
}