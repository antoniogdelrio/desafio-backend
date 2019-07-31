<?php $p = $users->id;?><!-- Coloco o atributo id do objeto $users passado em um variável -->
<?php require_once 'header.php'?>

	<h5><?php if(!empty($msg_edit)) {//flashdata indicando a falha da operação (não preencheu campo usuário)
				echo $msg_edit;
			  } ?></h5>

	<div class="container my-5">

		<?php echo form_open('welcome/atualizar/'.$p);?><!-- As informações do formulário são passadas para welcome/atualizar, sendo que a função atualizar() recebe um parâmetro de id, que é passado aqui, no intuito de localizar a row do usuário a partir do seu id -->
		  <fieldset>
		    <legend>Insira um funcionário</legend>
		    	<div class="row">
				    <div class="form-group col-6">
				    	<?php $data=array('name'=>'nome', 'value'=>$users->nome, 'class'=>'form-control');?>
				    	<?php echo form_input($data)?> <!--Nesse caso, diferente do insert.php, o campo nome já é preenchido com o atributo nome do objeto $users passado-->
				    </div>

				    <div class="form-group col-6">
				      <?php echo form_dropdown($name='cargo', $options=array('Diretor'=>'Diretor','Gerente'=>'Gerente','Coordenador'=>'Coordenador','Desenvolvedor'=>'Desenvolvedor','Estagiário'=>'Estagiário'), $selected=array($users->cargo), $extra=array('class'=>'form-control'));?>	
						<!--Diferente do insert.php, aqui o parâmetro $selected possui um valor estipulado, que é o atributo cargo do objeto $users passado-->
				    </div>

				</div>    	
		    <button type="submit" class="btn btn-primary">Inserir</button>
		  </fieldset>
		<?php echo form_close();?> <!--Função que equivale a um </form>-->
	</div>	

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>