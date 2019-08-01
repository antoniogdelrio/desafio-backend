<?php require_once 'header.php'?>

	<h5><?php if(!empty($msg)) {//flashdata que indica a entrada e saída do usuário logado
				echo $msg;
			  } ?></h5>
	<h5><?php if(!empty($msg_login)) {//flashdata que só é exibido em caso de tentativa de acesso à partes administrativas do sistema sem o login. A página é recarregada exigindo o login.
				echo $msg_login;
			  } ?></h5>
	
	<div class="container my-5">
		<?php echo form_open('login/entrar');?>
		  <fieldset>
		    <legend>Digite usuário e senha</legend>
		    	<div class="row">
				    <div class="form-group col-6">
				    	<?php $data_user=array('name'=>'usuario', 'class'=>'form-control', 'placeholder'=>'Login');?>
				    	<?php echo form_input($data_user)?> <!--Função que facilita a criação de inputs. Aceita outros parâmetros, porém nesse caso colocamos apenas o name="nome", para servir de referência no array $_POST-->
				    </div>

				    <div class="form-group col-6">
				      <?php $data_password=array('name'=>'senha', 'class'=>'form-control', 'placeholder'=>'Senha');?>
				      <?php echo form_password($data_password);?><!-- função que facilita a crianção de inputs de senha, recebendo um array de dados para configurações. O 'name' indica o nome da chave que o valor aparecerá no array $_POST que será enviado para login/entrar-->
				    </div>

				</div>    	
		    <button type="submit" class="btn btn-primary">Entrar</button>
		  </fieldset>

	</div>	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>