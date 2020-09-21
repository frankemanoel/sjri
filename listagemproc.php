<?php 
$painel_atual= "admin";

require "config.php";
?>

<!-- CORPO -->
<div style="color:#0d47a1; font-size:18px"><i class='material-icons'>account_box</i> Últimos Processos Cadastrados</div><hr>
<table class="striped">
<thead>
<tr>
<th width="50%">Processo</th>
<th width="40%">Cliente</th>
</tr>
</thead>
<tbody>
<?php include_once 'bd/readlimproc.php'; ?>
</tbody>
</table>
</br>
