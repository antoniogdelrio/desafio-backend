<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css')?>"><!--echo - para chamar funções, alem da função em si utilizo o echo para "imprimir o valor". Essa função facilita a inserção de URL's-->

    <title>CRUD</title>
      
  </head>
  <body>

  	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	  <a class="navbar-brand" href="#">Minha empresa</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarColor01">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item">
	        <?php 
	        	$usuario = $this->session->userdata('usuario');//Recupera o userdata 'usuario' em uma variável
	      	    if(!empty($usuario)){//Caso a variável esteja preenchida (usuario logado), botões do painel de administração e o botão 'sair' ficam disponíveis. Caso não, apenas o botão de login fica disponível.
                    echo anchor('welcome/carregar_lista', 'Listar', 'class="nav-link"');  
                }
	        ?><!-- função anchor realiza também a linkagem para o controller e seus métodos. 1ºparam = url do controller/metodo; 2º=label do link; 3º=conteudos adicionais, como classe, id, estilo, etc-->
	      </li>
	      <li class="nav-item">
	      	<?php
	      	    if(!empty($usuario)){
                    echo anchor('welcome/insert', 'Inserir', 'class="nav-link"');  
                }
	      	?>
	      </li>
	      <li>
	      	<?php 
                if(empty($usuario)){
                    echo anchor('login','Login','class="nav-link"');  
                }	
	      	?>
	      </li>
	      <li>
	      	<?php 
	      	    if(!empty($usuario)){
                    echo anchor('login/sair','Sair','class="nav-link"');  
                }
	      	?>
	      </li>
	    </ul>
	  </div>
	</nav>
