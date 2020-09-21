<?php 

session_start();

$painel_atual= "admin";
require "config.php";

include_once 'includes/header.inc.php';

include_once 'includes/menu.inc.php';

?>

<?php

include_once 'bd/conexao.php';

$nome     		= filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$status    		= filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS);
$code  		    = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_SPECIAL_CHARS);
$senha   		= filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$email 		    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
$cargo   		= filter_input(INPUT_POST, 'cargo', FILTER_SANITIZE_SPECIAL_CHARS);
$painel 	    = 'admin';

if(isset($_FILES['foto'])){
	
		$extensao = strtolower(substr($_FILES['foto']['name'], -4)); // pega a extensao do arquivo
		$novo_nome = md5(time()) . $extensao; // define o nome do arquivo
		$diretorio = "imagens/"; // define o diretorio para onde enviaremos o arquivo
		
		move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome); // efetua o upload

		$queryInsert = $link->query("insert into login values (default,'$status','$code','$senha','$nome','$painel','$email','$cargo','$novo_nome')");
		$affected_rows = mysqli_affected_rows($link);

	if($affected_rows > 0):
	$_SESSION['msg'] = "<p class='center gree-text'>".'Cadastro efetuado com sucesso!'."</p>";
	endif;

}

?>
   
    <div class="row container">
    <p>&nbsp;</p>
    <form action="usuarios.php" method="post" enctype="multipart/form-data"  class="col s12">
    <fieldset class="formulario" style=" padding:4px">
    <legend><i class="material-icons medium" style="color:#063">verified_user</i></legend>
    <h5 class="light center">Cadastro de Usuários</h5>
    
    <?php
	if(isset($_SESSION['msg'])):
	echo $_SESSION['msg'];
	session_unset();
	endif;
	?>

    <div class="input-field col s12">
    <input type="text" name="nome" id="nome" maxlength="200" required autofocus />
    <label for="nome">Nome Completo</label>
    </div>  

    <div class="input-field col s6">
    <input type="email" name="email" id="email" maxlength="120" required />
    <label for="email">Email</label>
    </div>      
    
    <div class="input-field col s6">
    <select id="cargo" name="cargo" required>
      <option value="Usuario">Usuario</option>
      <option value="Advogado">Advogado</option>
    </select>
    <label for="cargo">Cargo</label>
    </div>          

    <div class="input-field col s4">
    <input type="text" name="code" id="code" maxlength="100" required />
    <label for="code">Nome de Usuário</label>
    </div>  
    
    <div class="input-field col s4">
    <input type="text" name="senha" id="senha" maxlength="100" required />
    <label for="senha">Senha</label>
    </div>      

  <div class="input-field col s4">
    <select id="status" name="status">
      <option value="Ativo">Ativo</option>
      <option value="Inativo">Inativo</option>
    </select>
    <label for="status">Status</label>
  </div>
  
      <div class="input-field col s6">
        <span>Foto</span>
        <input type="file" id="foto" name="foto">
      </div>

    <!-- CAMPO BOTOES -->
    <div class="input-field col s12">
    <input type="submit" value="cadastrar" class="btn blue" />
    <input type="reset" value="limpar" class="btn red" />
    </div>        
    </fieldset>
    </form>
    
    
    <div class="col s12" style="margin-top:18px">
    <div style="color:#0d47a1; font-size:18px"><i class='material-icons'>verified_user</i>Usuários</div><hr>
    <table class="striped">
    <thead>
    <tr>
    <th width="15%">Foto</th>
    <th width="40%">Nome</th>
    <th width="15%">Usuario</th>
    <th width="15%">Status</th>
    <th width="15%">Cargo</th>    
    </tr>
    </thead>
    <tbody>

<?php


$queryp = "SELECT * FROM login";

$querySelectp = $link->query($queryp);

while($registrosp = $querySelectp->fetch_assoc()):
$id = $registrosp['id'];
$foto = $registrosp['foto'];
$nome = $registrosp['nome'];
$code = $registrosp['code'];
$status = $registrosp['status'];
$cargo = $registrosp['cargo'];

echo "<tr>";

if (empty($foto)){
	$foto = 'padrao.jpg';
}

echo "<td><img style='width:40px' src='imagens/$foto'</td><td>$nome</td><td>$code</td><td>$status</td><td>$cargo</td><td><a href='useditar.php?id=$id'><i class='material-icons'>remove_red_eye
</i></td><td><a href='bd/usconfdel.php?id=$id'><i class='material-icons'>delete</i></td>";

echo "</tr>";

endwhile;
?>
</tbody>
</table>    
</div>
</div>    
    
<?php include_once 'includes/footer.inc.php' ?>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script>
     $(document).ready(function() {
    $('select').formSelect();
    });
  </script>	