<?php require_once 'header.php'?>

	<h5><?php if(!empty($msg_insert)) {//flashdata que alerta se houver a tentativa de inserir um funcionário sem o nome. Recebi com o array $dados.
				echo $msg_insert;
			  } ?></h5>

	<div class="container my-5">

		<?php echo form_open('welcome/salvar');?><!--Função que abre um formulário, o parâmetro em questão é o "action" do form , ou seja, após clicar no botão com type="submit", o action indica para onde os dados irão. No caso eles vão para a função salvar() do controller welcome. Lá eles chegarão como um array $_POST que terá como chaves os valores que coloquei como "name" nos inputs. Por padrão o method dessa função é post-->
		  <fieldset>
		    <legend>Insira um funcionário</legend>
		    	<div class="row">
				    <div class="form-group col-6">
				    	<?php $data=array('name'=>'nome', 'class'=>'form-control');?>
				    	<?php echo form_input($data)?> <!--Função que facilita a criação de inputs. O primeiro parametro (name="nome") serve de referência no array $_POST, que é enviado para welcome/salvar. Já o outro parâmetro é para definição da classe, para o estilo (outro parâmetros também podem ser utilizados.-->
				    </div>

				    <div class="form-group col-6">
				      <?php echo form_dropdown($name='cargo', $options=array('Diretor'=>'Diretor','Gerente'=>'Gerente','Coordenador'=>'Coordenador','Desenvolvedor'=>'Desenvolvedor','Estagiário'=>'Estagiário'), $selected=array(), $extra=array('class'=>'form-control'));?><!-- Função que cria um dropdown. Tem como parâmetros o name (referência para $_POST), $options(em forma de array), $selected(para definição de opções que devem ficar pré-selecionadas. Coloco aqui apenas a chave da opção, e não seu valor), $extra(para outras funcionalidades, no caso, a classe para estilos) -->
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