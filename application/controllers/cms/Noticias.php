<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Noticias extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Noticia_model', 'noticia');
	}

	// CRUD
	// View que lista todos as noticias do sistema sem as imagens
	public function index() {
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca as infos e carrega a tela
		$data['noticias'] = $this->noticia->buscaNoticias();
		$this->load->view('cms/lista_noticias', $data);
	}

	// Chama a view para inserir uma nova notícia
	public function createView () {
		if (!$this->temPermissao(2)) {
			return;
		}
		$this->load->view("cms/cadastrar_noticia");
	}

	// Insere uma nova notíca no banco de dados
	public function create () {
		if (!$this->temPermissao(2)) {
			return;
		}
		// Seta as informações
		$data['titulo'] = $this->input->post('titulo');
		$data['previa']= $this->input->post('previa');
		$data['texto'] = $this->input->post('texto');
		// Faz o upload da imagem
		$this->load->model("Image_model", 'image');
		$data['foto'] = $this->image->upload("Noticia", "Foto");

		// Caso o upload tenha dado certo, salva as infos no banco, caso contrário retorna um erro
		if ($data['foto']) {
			// Se o create foi feito com sucesso vai para a lisgem de notcia, caso contrário vai para a tela de erro
			if ($this->noticia->create($data)) {
				redirect(base_url('cms/noticias'));
			}
			else {
				$this->load->view('errors/erros_share/erro_geral');
			}
		}
		else {
			$this->load->view('errors/erros_share/erro_geral');
		}
	}

	// Abre a view para atualizar uma notícia
	public function updateView ($noticia_id = NULL) {
		if (!$this->temPermissao(2)) {
			return;
		}
		// Busca a noticia
		$data['noticia'] = $this->noticia->buscaNoticia($noticia_id);
		$this->load->view("cms/editar_noticia", $data);		
	} 

	// Atualiza a noticia no banco de dados
	public function update () {
		if (!$this->temPermissao(2)) {
			return;
		}
		// Seta as informações
		$data['noticia_id'] = $this->input->post('noticia_id');
		$data['titulo'] = $this->input->post('titulo');
		$data['previa']= $this->input->post('previa');
		$data['texto'] = $this->input->post('texto');
		// Faz o upload da imagem
		$this->load->model("Image_model", 'image');
		$data['foto'] = $this->image->upload("Noticia", "Foto", $data['noticia_id']);

		// Caso o upload tenha dado certo, salva as infos no banco, caso contrário retorna um erro
		if ($data['foto']) {
			// Atualiza a foto e as outras infos, caso ocorra algum erro, vai para a página de erro
			if ($this->image->updateName("Noticia", "Foto", $data['noticia_id'], $data['foto']) && $this->noticia->update($data)) {
				redirect(base_url('cms/noticias'));
			}
			else {
				$this->load->view('errors/erros_share/erro_geral');
			}
		}
		// Atualiza os dados menos a foto
		else if ($this->noticia->update($data)){
			redirect(base_url('cms/noticias'));
		}
		else {
			$this->load->view('errors/erros_share/erro_geral');
		}
	}

	// Exclui uma noticia do banco
	public function delete () {
		if (!$this->temPermissao(2)) {
			return;
		}
		// Recebe o id da noticia que deve ser exlcuida
		$noticia_id = $this->input->post('noticia_id');

		// Exclui a foto
		$this->load->model("Image_model", "image");
		if(!$this->image->delete("Noticia", "Foto", $noticia_id)) {
			echo false;
		}
		else {
			// Exclui o registro
			if($this->noticia->delete($noticia_id)) {
				echo true;
			}
			else {
				echo false;
			}
		}

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