<?php
include_once "bd/conexao.php";

  $codigo = $_SESSION['code'];


$query = "SELECT * FROM login where code=$codigo";

$querySelect = $link->query($query);

while($registros = $querySelect->fetch_assoc()):
$nome = $registros['nome'];
$email = $registros['email'];
$foto = $registros['foto'];
endwhile;
?>

  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img style="width:100%" src="imagens/softjuri.png">
      </div>

<?php     
     if (empty($foto)){
	$foto = 'padrao.jpg';
}
?>
      <a><img class="circle" src="<?php echo 'imagens/'.$foto; ?>" /></a>     
      <a><span class="white-text name"><?php echo $nome; ?></span></a>
      <a><span class="white-text email"><?php echo $email; ?></span></a>
    </div></li>
				<li><a href="usuarios.php"><i class="material-icons left">verified_user</i>Controle de Usuários</a></li>
				<li><a href="organizacao.php"><i class="material-icons left">location_city</i>Informações do Escritório</a></li>
  </ul>

                <a style="color:#90a4ae" href="#" data-target="slide-out" class="sidenav-trigger"><i style="font-size:40px" class="material-icons">menu</i></a>


<ul id="dropdown1" class="dropdown-content">
				<li><a href="documentos.php"><i class="large material-icons left">folder</i>Documentos</a></li>
				<li><a href="financeiro.php"><i class="large material-icons left">attach_money</i>Financeiro</a></li>
				<li><a href="publicacoes.php"><i class="large material-icons left">library_books</i>Publicações</a></li>
</ul>

<ul id="dropdown2" class="dropdown-content">
				<li><a href="usuarios.php"><i class="large material-icons left">account_box</i>Clientes</a></li>
				<li><a href="organizacao.php"><i class="large material-icons left">gavel</i>Processos</a></li>
				<li><a href="conagenda.php"><i class="large material-icons left">event</i>Agenda</a></li>                
                
</ul>

	<nav class="nav-extended blue-grey lighten-2">
		<div class="nav-wrapper container">
			<ul id="nav-mobile" class="center">
 			    <li><a href="home.php"><i class="large material-icons left">home</i>Inicial</a></li>
				<li><a href="consultas.php"><i class="large material-icons left">account_box</i>Clientes</a></li>
				<li><a href="conproc.php"><i class="large material-icons left">gavel</i>Processos</a></li>
				<li><a href="conagenda.php"><i class="large material-icons left">event</i>Agenda</a></li>                
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Arquivo<i class="material-icons right">cloud arrow_drop_down</i></a></li>
                <li><a class="dropdown-trigger" href="#!" data-target="dropdown2">Relatórios<i class="material-icons right">print arrow_drop_down</i></a></li>                
                <li><a href="config.php?acao=quebra"><i class="material-icons left">exit_to_app</i>Sair</a></li>
                </ul>
			</div>
	</nav>

  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  <script>
    $(document).ready(function() {
    $('.sidenav').sidenav();
    });
  </script>	 