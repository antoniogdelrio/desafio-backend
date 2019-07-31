<?php

	class Login_model extends CI_Model{ //Herança obrigatória // atributos seguem as colunas do db
		public $usuario;
		public $senha;

		public function __construct() {//Construção obrigatória
			parent::__construct(); 
		}

		public function logar(){
			$usuario = $this->usuario;//coloca em variáveis os atributos do objeto, já definidos em Login
			$senha = $this->senha;

			$this->db->where('usuario', $usuario);
			$this->db->where('senha', $senha);
			$query = $this->db->get('login');//realiza uma consulta no db da row que possui as informações dadas

			return $query->num_rows();//função que retorna o numero de rows de uma consulta
		}

		public function inserir(){ //Insere os dados diretamente no banco de dados
			$dados = array("nome"=>$this->nome, "cargo"=>$this->cargo); //Como a função salvar() do controller já alterou os atributos do objeto, crio esse array que apeans referencia cada atributo à uma chave que possue nome idêntico à coluna presente no db
			return $this->db->insert('user', $dados); //A função insert é uma função específica para db do Codeigniter, e tem como primeiro parâmetro o nome da table do db, o segundo um array com os valor, sendo que cada chave representa identicamente o nome de uma coluna do db

			//O "$this->db->alguma_coisa" é uma escrita padrão para utilizar os métodos de banco de dados do Codeigniter
		}

		public function recuperar(){//Faz uma consulta (query) no banco de dados (SELECT * FROM)
			$query = $this->db->get('user');//get() é uma função interna que realiza a consulta, recebendo como parâmetro o nome da tabela do db
			return $query->result();//função result() retorna a query 
		}

	}


?>