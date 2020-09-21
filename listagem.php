<?php 
$painel_atual= "admin";





require "config.php";
?>

<!-- CORPO -->
<div style="color:#0d47a1; font-size:18px"><i class='material-icons'>account_box</i> Últimos Clientes Cadastrados</div><hr>
<table class="striped">
<thead>
<tr>
<th>Nome</th>
<th>Email</th>
</tr>
</thead>
<tbody>
<?php include_once 'bd/readlim.php'; ?>
</tbody>
</table>