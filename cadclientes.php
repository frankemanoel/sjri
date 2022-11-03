<?php 

session_start();

$painel_atual= "admin";
require "config.php";

include_once 'includes/header.inc.php';

include_once 'includes/menu.inc.php';

?>
   
    <div class="row container">
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <form action="bd/create.php" method="post" class="col s12">
    <fieldset class="formulario" style=" padding:15px">
    <legend><img src="imagens/cadastro.png" alt="[imagem]" width="100" /></legend>
    <h5 class="light center">Cadastro de Clientes</h5>
    
    <?php
	if(isset($_SESSION['msg'])):
	echo $_SESSION['msg'];
	session_unset();
	endif;
	?>

    <!-- CAMPO NOME -->
    <div class="input-field col s12">
    <i class="material-icons prefix">account_circle</i>
    <input type="text" name="nome" id="nome" maxlength="150" required autofocus />
    <label for="nome">Nome do Cliente</label>
    </div>  

    <!-- CAMPO EMAIL -->
    <div class="input-field col s6">
    <input type="email" name="email" id="email" maxlength="100" required />
    <label for="nome">Email</label>
    </div>
    
    <!-- CAMPO TELEFONE -->
    <div class="input-field col s6">
    <input type="tel" name="telefone" id="telefone" maxlength="14" />
    <label for="nome">Telefone</label>
    </div>
    
    <div class="input-field col s6">
    <input type="tel" name="celular" id="celular" maxlength="14" required />
    <label for="nome">Celular</label>
    </div>        

    <div class="input-field col s6">
    <input type="text" name="rg" id="rg" maxlength="20" />
    <label for="nome">RG</label>
    </div>
    
    <div class="input-field col s6">
    <input type="text" name="cpf" id="cpf" maxlength="14" />
    <label for="nome">CPF</label>
    </div> 
    
    <div class="input-field col s6">
    <input type="text" name="cnpj" id="cnpj" maxlength="20" />
    <label for="nome">CNPJ</label>
    </div>     
    
    <div class="input-field col s6">
    <input type="text" name="nacionalidade" id="nacionalidade" maxlength="80" />
    <label for="nome">Nacionalidade</label>
    </div>        

    <div class="input-field col s6">
    <input type="text" name="naturalidade" id="naturalidade" maxlength="80" />
    <label for="nome">Naturalidade</label>
    </div>  
    
    <div class="input-field col s12">
    <input type="text" name="endereco" id="endereco" maxlength="80" />
    <label for="nome">Endereço</label>
    </div>   
    
    <div class="input-field col s4">
    <input type="text" name="profissao" id="profissao" maxlength="100" />
    <label for="nome">Profissão</label>
    </div>          
    
    <div class="input-field col s4">
    <input type="text" name="estcivil" id="estcivil" maxlength="50" />
    <label for="nome">Estado Civil</label>
    </div>          
           
    <div class="input-field col s4">
    <input type="date" name="datanasc" id="datanasc" maxlength="10" />
    <label for="nome">Data de Nascimento</label>
    </div>     
    
    <div class="input-field col s4">
    <input type="date" name="datacad" id="datacad" maxlength="10" />
    <label for="nome">Cliente desde</label>
    </div>              
    
    <div class="input-field col s8">
    <input type="text" name="observacoes" id="observacoes" maxlength="200" />
    <label for="nome">Observações</label>
    </div>                  
           
    <!-- CAMPO BOTOES -->
    <div class="input-field col s12">
    <input type="submit" value="cadastrar" class="btn blue" />
    <input type="reset" value="limpar" class="btn red" /> 
    </div>       
    </fieldset>
    </form>
    </div>
    
    
<?php include_once 'includes/footer.inc.php' ?>
<p>&nbsp;</p>