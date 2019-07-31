<?php

class Login extends CI_Controller
{
        public function index()
        {
                $this->load->library('migration');
                $this->migration->current();
                $usuario = $this->session->userdata('usuario'); 
                if(!empty($usuario)){
                        redirect('welcome');//Verifica se o usuário está logado (variavel preenchida). Caso esteja, redireciona para o controlador welcome, onde será automaticamente levado à table.php
                }
                $dados['msg_login'] = $this->session->flashdata('msg_login');
                $this->load->view('login', $dados);//Um flashdata envia à pagina de login um aviso solicitando o login para ter acesso à parte administrativa, em caso de tentativa de acesso à table.php ou insert.php via URL. Só será exbibido se a variável estiver preenchida, como se vê em login.php. O arquivo é enviado como segundo parâmetro da view, que representa um array que posso chamar na login´.php apenas pela sua chave 'msg_login'. A variável só será preenchida quando houver o seu set no construtor do controlador Welcome, que verifica se o userdata 'usuario' está preenchido (indicador de usuario logado).
        }

        public function entrar(){
                $this->load->model('Login_model');
                $this->Login_model->usuario = $_POST["usuario"]; //Carrega os atributos do objeto Login_model com o que foi digitado na pagina login.php
                $this->Login_model->senha = $_POST["senha"];
                if($this->Login_model->logar()){//Como a função logar() retorna o numero de rows do db que correspondem ao usuario e senha digitados, uma vez que o if é verdadeiro ele realiza os processos abaixo
                        $this->session->set_userdata('usuario', $_POST["usuario"]);//A variável userdata dentro de uma seção pode ser usada por todo o sistema dentro de um determinado tempo. Nesse caso, ela é útil para que todo o sistema saiba que há um usuário logado. O primeiro parâmetro é nome dessa variável, e o segundo o seu valor
                        $this->load->model('User_model');
                        $dados['users'] = $this->User_model->recuperar();//carraga o db com os funcionários e configura a var de dados, pois a pagina que será carregada é a table.php, que imprime todos os funcionários
                        $this->session->set_flashdata('login', 'Login de '. $this->Login_model->usuario .' efetuado com sucesso!');//Dá um set no flashdata, que são dados que possuem uso apenas na próxima requisição e depois desaparecem. Nesse caso, ele apenas indica que o login foi efetuado com sucesso.
                        $dados['msg'] = $this->session->flashdata('login');//Passagem do flashdata para um array que apresentará na table.php
                        $this->load->view('table', $dados);
                }
                else{
                        $this->session->set_flashdata('login', 'Falha ao efetuar o login. Verifique o nome de usuário e a senha.');//Caso a função logar() não retorne nenhuma linha, indicando que o usuário digitado não existe, preenche-se o flashdata com uma mensagem de aviso diferente, e dessa vez retornando para a página login.php
                        $dados['msg'] = $this->session->flashdata('login'); 
                        $this->load->view('login', $dados);
                }
        }

        public function sair(){

            $this->load->model('Login_model');
            $this->session->set_userdata('usuario', ''); //A saida de um usuario do login é representada pela userdata 'usuário' vazia, indicando para todo o sistema que houve logout
            $this->session->set_flashdata('login', 'Usuario saiu com sucesso');
            $dados['msg'] = $this->session->flashdata('login'); 
            $this->load->view('login', $dados);
        }

}