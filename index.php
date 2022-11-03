
<?php 
include_once 'includes/header.inc.php';
require "bd/conexao.php" ;

?>
</head>

<body>


	

<?php
if(isset($_POST['button'])){
	$code = $_POST['code'];
	$password = $_POST['password'];	

    if ($code == ''){
	   echo "Por favor, digite o número do cartão ou código de acesso!";
    }

	else if($password == ''){
	echo "<h5>Por favor, digite sua senha!</h5>";
	
	} else {
	$sql = "SELECT * FROM login WHERE code = '$code' AND senha = '$password'";
	
	$result = mysqli_query($link, $sql);
	if(mysqli_num_rows($result) > 0) {
     	
		while($res_1 = mysqli_fetch_assoc($result)){
		$status = $res_1['status'];	
		$code = $res_1['code'];	
		$senha = $res_1['senha'];	
		$nome = $res_1['nome'];	
		$painel = $res_1['painel'];	
		
		if($status == 'Inativo'){
		  echo "<h2> Você está inativo, procure a administração </h2>";	
		} else {
		  session_start();
		  $_SESSION['code']	= $code;
		  $_SESSION['nome']	= $nome;
		  $_SESSION['senha'] = $senha;
		  $_SESSION['painel']	= $painel;
		  
		  if($painel == 'admin'){
			  echo "<script language='javascript'>  window.location='\home.php';</script>";
		
	} else {
		echo "<h2> Dados incorretos! </h2>";
	}
	}
		}
	}
	}
		}
	
?>

<center>
<img style="width:100px;" src="imagens/senaclogo.png" />
</center>
<div class="row container" style="padding-top:100px">

<form name="form" method="post" action="" enctype="multipart/form-data">
<center>
    <fieldset class="formulario" style=" padding:15px; width:40%">
    <div class="input-field col s12">
    <i class="material-icons prefix">contacts</i>
    <input type="text" name="code" required autofocus />
    <label for="nome">Usuário</label>
    </div>
    
    
    <div class="input-field col s12">
    <i class="material-icons prefix">lock_open</i>
    <input type="password" name="password" required />
    <label for="nome">Senha</label>
    </div>
    
    <div class="input-field col s12">
    <input type="submit" name="button" value="Entrar" class="btn green" />
    </div>
</fieldset>    
</center>
</form>

</div>

</body>
</html>

<?php include_once 'includes/footer.inc.php'; ?>
