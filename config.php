<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SoftJuri</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css" />
<link rel="shortcut icon" href="imagens/sb.png" />

</head>

<body>
<?php

require "bd/conexao.php";

@session_start();

          $code = $_SESSION['code'];
		  $nome = $_SESSION['nome'];
		  $senha = $_SESSION['senha'];
		  $painel = $_SESSION['painel'];
		  
		  if($code == ''){
			echo "<script language='javascript'>window.location='index.php';</script>";
		  } else if($nome == ''){
    		echo "<script language='javascript'>window.location='index.php';</script>";
		  } else if($senha == ''){
    		echo "<script language='javascript'>window.location='index.php';</script>";
		  } else {
            if($painel_atual != $painel){
				echo "<script language='javascript'>window.location='index.php';</script>";
				$_SESSION = array();
			}
		  

	}
		  

?>
</body>
</html>