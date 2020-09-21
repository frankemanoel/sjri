<?php

session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';

$painel_atual= "admin";

?>

<?php

 include_once 'bd/conexao.php';
 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 $_SESSION['id'] = $id;
 $querySelect = $link->query("select * from clientes where id='$id'");
 
 while($registros = $querySelect->fetch_assoc()):
 $nome 			= $registros['nome'];
 $email 		= $registros['email'];
 $telefone 		= $registros['telefone']; 
 $celular 		= $registros['celular'];
 $rg 			= $registros['rg'];
 $cpf 			= $registros['cpf'];
 $cnpj 			= $registros['cnpj'];
 $nacionalidade = $registros['Nacionalidade'];
 $naturalidade  = $registros['Naturalidade'];
 $endereco     	= $registros['endereco'];
 $profissao    	= $registros['profissao'];
 $estadocivil   = $registros['estcivil'];
 $nascimento    = $registros['datanasc'];
 $clientedesde  = $registros['datacad'];
 $observacoes   = $registros['observacoes'];
 endwhile;

function cpf($cpf) {

   if (! $cpf) {

       return '';

   }

   if (strlen($cpf) == 11) {

       return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9);

   }

   return $cpf;

}

?>




   <div class="row container">
   <div style="color:#0d47a1; font-size:18px"><i class='material-icons'>account_box</i> Dados do Cliente</div><hr>
    <form action="bd/update.php" method="post">
    <fieldset class="formulario" style=" padding:15px; border-color:transparent">
    
    <!-- CAMPO NOME -->
    <div class="input-field col s6">
    <input type="text" name="nome" value="<?php echo $nome ?>" id="nome" maxlength="40" autofocus />
    <label for="nome">Nome Completo</label>
    </div> 
    
    <!-- CAMPO EMAIL -->
    <div class="input-field col s6">
    <input type="text" name="email" id="email" value="<?php echo $email ?>" maxlength="100" />
    <label for="nome">Email</label>
    </div>
    
    <!-- CAMPO TELEFONE -->
    <div class="input-field col s4">
    <input type="tel" name="telefone" id="telefone" value="<?php echo $telefone ?>" maxlength="14" />
    <label for="nome">Telefone</label>
    </div>
    
    <div class="input-field col s4">
    <input type="tel" name="celular" id="celular" value="<?php echo $celular ?>" maxlength="14" />
    <label for="nome">Celular</label>
    </div>        

    <div class="input-field col s4">
    <input type="text" name="rg" id="rg" value="<?php echo $rg ?>" maxlength="20" />
    <label for="nome">RG</label>
    </div>
    
    <div class="input-field col s4">
    <input type="text" name="cpf" id="cpf" value="<?php echo $cpf ?>" maxlength="14" />
    <label for="nome">CPF</label>
    </div> 
    
    <div class="input-field col s4">
    <input type="text" name="cnpj" id="cnpj" value="<?php echo $cnpj ?>" maxlength="20" />
    <label for="nome">CNPJ</label>
    </div>     
    
    <div class="input-field col s4">
    <input type="text" name="nacionalidade" id="nacionalidade" value="<?php echo $nacionalidade ?>" maxlength="80" />
    <label for="nome">Nacionalidade</label>
    </div>        

    <div class="input-field col s4">
    <input type="text" name="naturalidade" id="naturalidade" value="<?php echo $naturalidade ?>" maxlength="80" />
    <label for="nome">Naturalidade</label>
    </div>  
    
    <div class="input-field col s8">
    <input type="text" name="endereco" id="endereco" value="<?php echo $endereco ?>" maxlength="80" />
    <label for="nome">Endereço</label>
    </div>   
    
    <div class="input-field col s4">
    <input type="text" name="profissao" id="profissao" value="<?php echo $profissao ?>" maxlength="100" />
    <label for="nome">Profissão</label>
    </div>          
    
    <div class="input-field col s4">
    <input type="text" name="estcivil" id="estcivil" value="<?php echo $estadocivil ?>" maxlength="50" />
    <label for="nome">Estado Civil</label>
    </div>          
           
    <div class="input-field col s4">
    <input type="text" name="datanasc" id="datanasc" value="<?php echo $nascimento ?>" maxlength="10" />
    <label for="nome">Data de Nascimento</label>
    </div>     
    
    <div class="input-field col s4">
    <input type="text" name="datacad" id="datacad" value="<?php echo $clientedesde ?>" maxlength="10" />
    <label for="nome">Cliente desde</label>
    </div>                 
    
    <div class="input-field col s8">
    <input type="text" name="observacoes" id="observacoes" value="<?php echo $observacoes ?>" maxlength="200" />
    <label for="nome">Observações</label>    
    </div>

    <!-- CAMPO BOTOES -->
    <div class="input-field col s12">
    <input type="submit" value="alterar" class="btn blue" />
    <a href="consultas.php" class="btn red">cancelar</a>
    </div>

    </fieldset>
    </form>
    
    

<div class="col s12">
<div style="color:#0d47a1; font-size:18px"><i class='material-icons'>account_box</i> Processos do Cliente</div><hr>
<table class="striped">
<thead>
<tr>
<th width="20%">Processo</th>
<th width="22%">Cliente</th>
<th width="10%">Situação</th>
<th width="40%">Objeto da Ação</th>
</tr>
</thead>
<tbody>
<?php

$idc = $id;
$queryp = "SELECT * FROM processos where id_cliente = $id";

$querySelectp = $link->query($queryp);

while($registrosp = $querySelectp->fetch_assoc()):
$idp = $registrosp['id_processo'];
$processo = $registrosp['processo'];
$idcliente = $registrosp['id_cliente'];
$situacao = $registrosp['CAMPOCL'];
$objacao = $registrosp['objacao'];

$QueryCliente = "SELECT nome FROM clientes WHERE id=$idcliente";
$querySelectC = $link->query($QueryCliente);
while($regclie = $querySelectC->fetch_assoc()):
$idcliente = $regclie['nome'];
endwhile;


if($situacao == 1){
	$situacao = "Ativo";
} else {
	$situacao = "Arquivado";
}

echo "<tr>";

echo "<td>$processo</td><td>$idcliente</td><td>$situacao</td><td>$objacao</td><td><a href='edproc.php?id=$idc'><i class='material-icons'>remove_red_eye
</i></td>";

echo "</tr>";

endwhile;
?>
</tbody>
</table>
</br>
</div>    
    
    </div>
    

<!-- CORPO -->


<?php

include_once 'includes/footer.inc.php';

?>