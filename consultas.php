<?php 
$painel_atual= "admin";
require "config.php";

include_once 'includes/header.inc.php';

include_once 'includes/menu.inc.php';


?>

<!-- CORPO -->

<div class="row container">
<div class="col s12">
<h5 style="color:#0d47a1">Clientes</h5><hr>
<a href="cadclientes.php" class="btn right">Novo Cliente</a>

<table class="striped">
<thead>
<tr>
<th>Nome</th>
<th>Email</th>
<th>Telefone</th>
</tr>
</thead>
<tbody>
    
<?php include_once 'bd/read.php'; ?>
</tbody>
</table>

</div>
</div>

<?php

include_once 'includes/footer.inc.php';

?>