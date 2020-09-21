<?php

session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';

$painel_atual= "admin";

?>

<div class="row container">
<div class="col s12">

<h5 class="light">Edição de Usuários</h5><hr>

</div>
</div>

<?php

 include_once 'bd/conexao.php';
 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 $_SESSION['id'] = $id;
 $querySelect = $link->query("select * from login where id='$id'");
 
 while($registros = $querySelect->fetch_assoc()):
	$nome = $registros['nome'];
	$code = $registros['code'];
	$senha = $registros['senha'];
	$status = $registros['status'];
	$foto = $registros['foto'];
	$cargo = $registros['cargo'];
	$email = $registros['email'];
 endwhile;
?>




   <div class="row container">
    <p>&nbsp;</p>
    <form action="bd/usupdate.php" method="post" class="col s12" enctype="multipart/form-data">
    <fieldset class="formulario" style=" padding:15px">
    <legend><img src="imagens/cadastro.png" alt="[imagem]" width="100" /></legend>
    <h5 class="light center">Alteração</h5>
    
    <!-- CAMPO TITULO -->
    <div class="input-field col s12">
    <input type="text" name="nome" value="<?php echo $nome ?>" id="nome" maxlength="200" autofocus />
    <label for="nome">Nome Completo</label>
    </div> 
    
    <!-- CAMPO COR -->
    <div class="input-field col s4">
    <input type="text" name="code" id="code" value="<?php echo $code ?>" maxlength="100" />
    <label for="nome">Usuário</label>
    </div>
    
    <!-- CAMPO INICIO -->
    <div class="input-field col s4">
    <input type="text" name="senha" id="senha" value="<?php echo $senha ?>" maxlength="100" />
    <label for="nome">Senha</label>
    </div>

  <div class="input-field col s4">
    <select id="status" name="status">
      <option value="<?php echo $status ?>"><?php echo $status ?></option>
      <option value="Ativo">Ativo</option>
      <option value="Inativo">Inativo</option>
    </select>
    <label for="status">Status</label>
  </div>       

    <div class="input-field col s6">
    <input type="email" name="email" id="email" value="<?php echo $email ?>" maxlength="120" required />
    <label for="email">Email</label>
    </div>      
    
    <div class="input-field col s6">
    <select id="cargo" name="cargo" required>
      <option value="<?php echo $cargo ?>"><?php echo $cargo ?></option>
      <option value="Usuario">Usuario</option>      
      <option value="Advogado">Advogado</option>
    </select>
    <label for="cargo">Cargo</label>
    </div>    
    
      <div class="input-field col s4">
        <span>Foto</span>
        <input type="file" id="fotoupd" name="fotoupd">
      </div>      
      
      <div class="input-field col s4">
        <label>
            <input type="checkbox" name="permfoto" id="permfoto" />
            <span>Permtir alteração de foto?</span>
        </label>  
	  </div>

    <!-- CAMPO BOTOES -->
    <div class="input-field col s12">
    <input type="submit" value="alterar" class="btn blue" />
    <a href="usuarios.php" class="btn red">cancelar</a>
    </div>

        
    </fieldset>
    </form>
    </div>

<?php

include_once 'includes/footer.inc.php';


?>