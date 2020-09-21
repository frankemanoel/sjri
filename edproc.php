<?php

session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';

$painel_atual= "admin";

?>

<div class="row container">
<div class="col s12">

<h5 class="light">Edição de Registros</h5><hr>

</div>
</div>

<?php

 include_once 'bd/conexao.php';
 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 $_SESSION['id'] = $id;
 $querySelect = $link->query("select * from processos where id_processo = $id");

    while($registros = $querySelect->fetch_assoc()):
 		$idadm     		= $registros['id_adm'];
		$idcliente    	= $registros['id_cliente'];
		$processo  		= $registros['processo'];
		$representante  = $registros['representante'];
		$acao 	    	= $registros['acao'];
		$vara 	    	= $registros['vara'];
		$valor 		    = $registros['valor'];
		$observacoes 	= $registros['observacoes'];
		$situacao  		= $registros['situacao'];
		$datacad   		= $registros['DataCad'];
		$resultado 	    = $registros['Resultado'];
		$honorarios 	= $registros['v_original'];
		$percentual 	= $registros['v_aliquota'];
		$objacao 		= $registros['objacao'];
	
	endwhile;

?>

   <div class="row container">
    <p>&nbsp;</p>
    <form action="bd/procupdate.php" method="post" class="col s12">
    <fieldset class="formulario" style=" padding:15px">
    <legend><img src="imagens/cadastro.png" alt="[imagem]" width="100" /></legend>
    <h5 class="light center">Alteração</h5>
    
    <div class="input-field col s6">
    <input type="text" name="processo" id="processo" value="<?php echo $processo ?>"  maxlength="100" required autofocus />
    <label for="nome">Número do Processo</label>
    </div>
    
    <div class="input-field col s6">
    <select id="situacao" name="situacao">
    	<option><?php echo $situacao ?></option>
    	<option>Ativo</option>
    	<option>Arquivado</option>
    </select>    
    <label for="situacao">Situação</label>
    </div>      
    
    <div class="input-field col s6">
    <select id="idadm" name="idadm">
        <?php
        //VERIFICA NOME DO ADVOGADO
        $QueryAdv = "SELECT nome FROM login WHERE id=$idadm";
        $querySelectA = $link->query($QueryAdv);
        while($regadv = $querySelectA->fetch_assoc()):
        $idadvn = $regadv['nome'];
        endwhile;
		?>    
            <option value="<?php echo $idadm ?>"><?php if(empty($idadvn)) { echo ""; } else { echo $idadvn; } ?></option>
         <?php   
         //LISTA OUTROS ADVOGADOS
        $querysela = "SELECT * FROM login where cargo = 'Advogado'";
        $querySelectSela = $link->query($querysela);
		
        while($registrosela = $querySelectSela->fetch_assoc()):
        $ida = $registrosela['id'];
        $nomea = $registrosela['nome'];
            echo '<option value="'.$registrosela["id"].'">'.$registrosela["nome"].'</option>';    
        endwhile;
?>


</select>
    <label for="nome">Advogado</label>
    </div>  

    <div class="input-field col s6">
    <select id="idcliente" name="idcliente">

        <?php
        //VERIFICA NOME DO CLIENTE
        $QueryCliente = "SELECT nome FROM clientes WHERE id=$idcliente";
        $querySelectC = $link->query($QueryCliente);
        while($regclie = $querySelectC->fetch_assoc()):
        $idclienten = $regclie['nome'];
        endwhile;?>    
  
            <option value="<?php echo $idcliente ?>"><?php echo $idclienten ?></option>
            
         <?php   
         //LISTA OUTROS CLIENTES
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
    <input type="text" name="representante" id="representante" value="<?php echo $representante ?>" maxlength="100" required />
    <label for="nome">Reclamante</label>
    </div>  

    <div class="input-field col s6">
    <input type="text" name="acao" id="acao" value="<?php echo $acao ?>" maxlength="100" />
    <label for="nome">Parte Contrária</label>
    </div>
    
    <div class="input-field col s6">
    <input type="text" name="vara" id="vara" value="<?php echo $vara ?>" maxlength="100" />
    <label for="nome">Vara</label>
    </div>  
    
    <div class="input-field col s6">
    <input type="date" name="datacad" id="datacad" value="<?php echo $datacad ?>" maxlength="80" />
    <label for="nome">Data do Cadastro</label>
    </div>   
    
    <div class="input-field col s6">
    <input type="text" name="resultado" id="resultado" value="<?php echo $resultado ?>" maxlength="100" />
    <label for="nome">Resultado do Processo</label>
    </div>  
    
    <div class="input-field col s2">
    <input type="text" name="valor" id="valor" value="<?php echo $valor ?>" maxlength="100" />
    <label for="nome">Valor</label>
    </div>                   
    
    <div class="input-field col s2">
    <input type="text" name="honorarios" id="honorarios" value="<?php echo $honorarios ?>" maxlength="50" />
    <label for="nome">Honorários</label>
    </div>          
           
    <div class="input-field col s2">
    <input type="number" name="percentual" id="percentual" value="<?php echo $percentual ?>" maxlength="10" />
    <label for="percentual">Percentual do Advogado</label>
    </div>     

    <div class="input-field col s8">
    <input type="text" name="objacao" id="objacao" value="<?php echo $objacao ?>" maxlength="200" />
    <label for="nome">Objeto da Ação</label>    
    </div> 
    
    <div class="input-field col s12">
    <input type="text" name="observacoes" id="observacoes" value="<?php echo $observacoes ?>" maxlength="200" />
    <label for="nome">Observações</label>
    </div>        
    
    <!-- CAMPO BOTOES -->
    <div class="input-field col s12">
    <input type="submit" value="alterar" class="btn blue" />
    <a href="conproc.php" class="btn red">cancelar</a>
    </div>
        
    </fieldset>
    </form>
    </div>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script>
    $(document).ready(function() {
    $('select').formSelect();
    });
  </script>	 

<?php

include_once 'includes/footer.inc.php';

?>