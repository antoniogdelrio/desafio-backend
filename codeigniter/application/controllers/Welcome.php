<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		//A função construtora no controller sempre é executada quando o controller é solicitado. Nesse caso, como o controller Welcome é o que dá acesso à partes do sistema de acesso restrito, o contrutor basicamente verificará se o usuário está ou não logado, a partir do preenchimento ou não do userdata
		parent:: __construct();
		$usuario = $this->session->userdata('usuario'); //$usuario recebe a informação do userdata

		if(empty($usuario)){//Caso o userdata esteja vazio, indicando que ninguém está logado, o usuário é redirecionado para a pagina de login, junto do flashdata solicitando o login
			$this->session->set_flashdata('msg_login', 'Faça login para ter acesso.');
			redirect('login');
		}

	}

	public function index()
	{
		$this->carregar_lista(); 
	}

	public function insert(){
		$this->load->view('insert');
	}

	public function salvar(){ //Metodo que coleta os dados do insert.php, coloca como atributos do model, e chama a função insert para 
		$this->load->model('User_model'); //Uma vez que faço load do model, posso fazer referência a ele para chamar chamar atributos, metodos, etc
		$nome = $_POST["nome"]; //Como o form está com method="post", faço essa referencia com $__POST como um array, que tem como chave o nome que coloquei em "name"
		$cargo = $_POST["cargo"];
		$this->User_model->nome = $nome;//Digo que o atributo nome do model receberá a variavel $nome que por sua vez contem o valor do $_POST["nome"]. Idem para o cargo
		$this->User_model->cargo = $cargo;
		$this->User_model->inserir(); //Chamada da função inserir(), que realiza a inserção dos dados no banco
		$dados['msg_insert'] = $this->session->flashdata('msg_insert');
		$this->load->view('insert', $dados);
		//$this->session->set_flashdata('','');
        //$dados['msg'] = $this->session->flashdata('login');
		//$this->load->view('insert', $dados);
	}

	public function carregar_lista(){//Função criada para carregar a pagina com a tabela, já abastecendo com todos os dados que estão no db
		$this->load->model('User_model');//Carrega o modelo (db)
		$dados['users'] = $this->User_model->recuperar();//cria um array dados com uma chave "users", que receberá o resultado da aplicação da função recuperar() já criada, ou seja, $dados['users'] é a instância que carrega o nosso db, que vem como um array de objetos
		$dados['msg_delete'] = $this->session->flashdata('msg_delete');//flashdata com o usuário deletado, em caso de a operação delete ser executada
		$this->load->view('table', $dados);//carrega enfim a view com a tabela, porém, passando como parãmetro o array $dados. Quando passamos um array de dados junto com a view, posso utilizar ele dentro da view sem precisar me referenciar ao seu nome, mas apenas à suas chaves (no caso temos uma chave única de nome 'users')
	}

	public function excluir($id){//Função que exclui funcionários do db
		$this->load->model('User_model');
		$this->User_model->delete($id); //função do model que possui as instruções para remover uma row baseada em um $id (que é fornecido pela própria pagina table.php)
		$this->carregar_lista();//recarrega a pagina
	}

	public function editar($id){
		$this->load->model('User_model');
		$dados['users'] = $this->User_model->recuperarUm($id);//função do model que faz a query de uma row do db baseada num $id
		$dados['msg_edit'] = $this->session->flashdata('msg_edit');//mensagem flashdata que só será carregado na operação de edição (em caso de falha da mesma)
		$this->load->view('edit', $dados);//carrega a pagina de edição, enviando os dados do usuario a ser editado, para preenchimento da pagina com os valores então salvos no db
	}

	public function atualizar($id){//função que finaliza a edição na edit.php,quando o botão é clicado
		$this->load->model('User_model'); 
		$this->User_model->nome = $_POST["nome"]; //definem-se os atributos do objetos User_model
		$this->User_model->cargo = $_POST["cargo"];
		
		$this->User_model->update($id);//função do model que atualiza a row

		if($this->User_model->update($id)){//caso o retorno seja verdadeiro, exibe-se a pagina table.php ataulizada com o flashdata positivo
			$dados['msg_edit'] = $this->session->flashdata('msg_edit');
			$dados['users'] = $this->User_model->recuperar();
			$this->load->view('table', $dados);//recarrega a table.php
		}
		else{//caso o retorno seja falso, executa-se a função editar, que recarrega a página edit.php, junto de um flashdata indicando a falha
			$this->editar($id);
		}
		
	}

}
