<?php 

session_start();

$painel_atual= "admin";
require "config.php";

include_once 'includes/header.inc.php';

include_once 'includes/menu.inc.php';

?>


    <div class="row container">
    <p>&nbsp;</p>
    <form action="bd/procreate.php" method="post" class="col s12">
    <fieldset class="formulario" style=" padding:15px">
    <legend><img src="imagens/cadastro.png" alt="[imagem]" width="100" /></legend>
    <h5 class="light center">Cadastro de Processos</h5>
    
    <?php
	if(isset($_SESSION['msg'])):
	echo $_SESSION['msg'];
	session_unset();
	endif;
	?>
    
    <div class="input-field col s6">
    <input type="text" name="processo" id="processo" maxlength="100" />
    <label for="nome">Número do Processo</label>
    </div>
    
  <div class="input-field col s6">
    <select id="situacao" name="situacao">
      <option value="Ativo">Ativo</option>
      <option value="Arquivado">Arquivado</option>
    </select>
    <label>Situação</label>
  </div>
    
    
    <div class="input-field col s6">
    <select id="idadm" name="idadm" required>
		<?php
			$queryA = "SELECT * FROM login where cargo='Advogado'";
			$querySelectA = $link->query($queryA);
			
			while($registroA = $querySelectA->fetch_assoc()):
			$id = $registroA['id'];
			$nome = $registroA['nome'];
					  echo '<option value="'.$registroA["id"].'">'.$registroA["nome"].'</option>';    
			endwhile;
        ?>    
	</select>
    <label for="idadm">Advogado</label>
    </div>  

    <div class="input-field col s6">
    <select id="idcliente" name="idcliente" required>
<?php
$querysel = "SELECT * FROM clientes";
$querySelectSel = $link->query($querysel);

while($registrosel = $querySelectSel->fetch_assoc()):
$id = $registrosel['id'];
$nome = $registrosel['nome'];
          echo '<option value="'.$registrosel["id"].'">'.$registrosel["nome"].'</option>';    
endwhile;
?>    
</select>
    <label for="idcliente">Cliente</label>
    </div>
    
    <div class="input-field col s6">
    <input type="text" name="representante" id="representante" maxlength="100" required />
    <label for="nome">Reclamante</label>
    </div>        

    <div class="input-field col s6">
    <input type="text" name="acao" id="acao" maxlength="100" />
    <label for="nome">Parte Contrária</label>
    </div>
    
    <div class="input-field col s6">
    <input type="text" name="vara" id="vara" maxlength="100" />
    <label for="nome">Vara</label>
    </div>  
    
    <div class="input-field col s6">
    <input type="date" name="datacad" id="datacad" maxlength="10" required/>
    <label for="nome">Data do Cadastro</label>
    </div>   
    
    <div class="input-field col s6">
    <input type="text" name="resultado" id="resultado" maxlength="100" />
    <label for="nome">Resultado do Processo</label>
    </div>  
    
    <div class="input-field col s2">
    <input type="text" name="valor" id="valor" maxlength="30" required/>
    <label for="nome">Valor</label>
    </div>                   
    
    <div class="input-field col s2">
    <input type="text" name="honorarios" id="honorarios" maxlength="50" required/>
    <label for="nome">Honorários</label>
    </div>          
           
    <div class="input-field col s2">
    <input type="number" name="percentual" id="percentual" maxlength="10" required/>
    <label for="percentual">Percentual do Advogado</label>
    </div>     

    <div class="input-field col s12">
    <input type="text" name="objacao" id="objacao" maxlength="120" />
    <label for="objacao">Objeto da Ação</label>
    </div>       
    
    <div class="input-field col s12">
    <input type="text" name="observacoes" id="observacoes" maxlength="200" />
    <label for="nome">Observações</label>
    </div>        
           
    <!-- CAMPO BOTOES -->
    <div class="input-field col s12">
    <input type="submit" value="cadastrar" class="btn blue" />
    <input type="reset" value="limpar" class="btn green" />        
    <a href="conproc.php" class="btn red">cancelar</a>
    </div>
    
    </fieldset>
    </form>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script>
     $(document).ready(function() {
    $('select').formSelect();
    });
  </script>	    
    
<?php include_once 'includes/footer.inc.php' ?>