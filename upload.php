<?php

include_once 'bd/conexao.php';

$msg = false;

if(isset($_FILES['foto'])){
	
$extensao = strtolower(substr($_FILES['foto']['name'], -4)); // pega a extensao do arquivo
$novo_nome = md5(time()) . $extensao; // define o nome do arquivo
$diretorio = "imagens/"; // define o diretorio para onde enviaremos o arquivo

move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$novo_nome); // efetua o upload

//$sql_code = "INSERT INTO login (id, status, code, senha, nome, painel, email, cargo, foto) VALUES (null, '$novo_nome', NOW())";

$queryEnvia = $link->query("INSERT INTO login VALUES (default, 'ativo', '111', '111', 'Testador', 'admin', 'testador@gmail.com', 'usuario', '$novo_nome')");

$affected_rows = mysqli_affected_rows($link);

if($affected_rows > 0):
header("Location:upload.php");
$msg = "Enviado com Sucesso";
endif;
}
?>

<h1>Upload de Arquivos</h1>
<?php
	if($msg != false){
		echo "<p> $msg </p>";
	}
?>
<form action="upload.php" method="POST" enctype="multipart/form-data">
      Arquivo: <input type="file" name="foto" required>
      <input type="submit" value="Salvar">
</form>
