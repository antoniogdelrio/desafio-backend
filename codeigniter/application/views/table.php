<!doctype html>
<?php require_once 'header.php'?>

	<h5><?php if(!empty($msg)) {//mensagem que indica o sucesso na operação de inserção do funcionário
				echo $msg;
			  } ?></h5>
	<h5><?php if(!empty($msg_edit)) {//mensagem que indica o sucesso na operação de edição
				echo $msg_edit;
			  } ?></h5>
	<h5><?php if(!empty($msg_delete)) {//mensagem que indica o sucesso na operação de remoção
				echo $msg_delete;
			  } ?></h5>

	<div class="container">
	    <table class="table my-5">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Nome</th>
		      <th scope="col">Cargo</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  	<?php foreach($users as $usuario){?><!--Para printar os dados do db, por serem mais de um, utilizo um foreach, que é a estrutura for para percorrer arrays. Me referencio diretamente a $users, que é uma das chaves (a unica no caso) do array de dados que foi passado ao carregarmos a view(verificar isso no método carregar_lista()), e faço com que cada objeto desse item (pois se trata de um item que contem varios objetos, que são os dados) como $usuario-->
		  <tbody>
		    <tr>
		      <th scope="row"><?php echo $usuario->id; $p=$usuario->id;?></th><!--Por fim, por se tratar de um objeto, me referencio a cada um de seus atributos (que são as colunas de cada linha da tabela do db) e printo na tela.-->
		      <td><?php echo $usuario->nome;?></td>
		      <td><?php echo $usuario->cargo;?></td>
		      <td><?php echo anchor('welcome/excluir/'.$p, 'DELETAR',['class'=>'btn btn-primary'])?></td><td><?php echo anchor('welcome/editar/'.$p,'EDITAR',['class'=>'btn btn-primary'])?></td><!-- Função para criação de links. O atributo classe permite a estilização do link como um botão. O primeiro parâmetro indica o controller/função que será chamado caso o botão seja pressionado. -->
		    </tr>
		  </tbody>
		  	<?php } ?>
		</table>
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>