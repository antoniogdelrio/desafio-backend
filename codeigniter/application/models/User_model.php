<?php

	class User_model extends CI_Model{ //Herança obrigatória
		public $id; // atributos seguem as colunas do db
		public $nome;
		public $cargo;

		public function __construct() {//Construção obrigatória
			parent::__construct(); 
		}

		public function inserir(){ //Insere os dados diretamente no banco de dados
			$dados = array("nome"=>$this->nome, "cargo"=>$this->cargo); //Como a função salvar() do controller já alterou os atributos do objeto, crio esse array que apeans referencia cada atributo à uma chave que possue nome idêntico à coluna presente no db
			if(!empty($dados['nome'])){
				$this->session->set_flashdata('msg_insert','Funcionário '.$dados['nome'].' inserido com sucesso');
				return $this->db->insert('user', $dados);	
			}
			else{
				$this->session->set_flashdata('msg_insert','Preencha um nome de usuario para cadastrar o funcionário.');
			}
			 //A função insert é uma função específica para db do Codeigniter, e tem como primeiro parâmetro o nome da table do db, o segundo um array com os valor, sendo que cada chave representa identicamente o nome de uma coluna do db
			}

			//O "$this->db->alguma_coisa" é uma escrita padrão para utilizar os métodos de banco de dados do Codeigniter

		public function recuperar(){//Faz uma consulta (query) no banco de dados (SELECT * FROM)
			$query = $this->db->get('user');//get() é uma função interna que realiza a consulta, recebendo como parâmetro o nome da tabela do db
			return $query->result();//função result() retorna a query 
		}

		public function delete($id){
			$this->db->where('id', $id);
			$query=$this->db->get('user');
			$nome = $query->row()->nome;//consulta feita para recuperar o nome do funcionario deletado
			$this->session->set_flashdata('msg_delete', 'Funcionario '.$nome.' deletado com sucesso');//flashdata com mensagem do usuario deletado
			$this->db->where('id', $id);
			$this->db->delete('user');//deleta da tabela o usuario com um id dado
			//obs: função delete só é permitida quando anteriormente executei a função where
		}

		public function recuperarUm($id){
			$this->db->where('id', $id);
			$query = $this->db->get('user');
			return $query->row();//retorna a row de um usuario a partir de um id dado
		}

		public function update($id){
			$nome = $this->nome;
			if(!empty($nome)) {//Se o usuario preencheu o nome, que está como atributo do objeto, realiza-se a edição
				$this->db->set('nome', $this->nome);//edita duas colunas de uma row, a partir das correções feitas em login.php e enviadas para Login/atualizar
				$this->db->set('cargo',$this->cargo);	
				$this->db->where('id', $id);
				$this->db->update('user');//faz a edição na tabela user da linha do usuario a partir de id dado
				$this->session->set_flashdata('msg_edit', 'Funcionário '.$this->nome.' editado com sucesso');//flashdata para mostrar o sucesso da operação
				return 1;//retorno para o if do welcome/atualizar
			}
			else{//caso o nome esteja vazio, não realiza-se a edição, e temos o flashdata indicando a falha na operação
				$this->session->set_flashdata('msg_edit', 'Nome do funcionário não foi preenchido');
				return 0;//retorno para o if do welcome/atualizar
			}
			
		}

	}


?>