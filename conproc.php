<?php 
$painel_atual= "admin";
require "config.php";

include_once 'includes/header.inc.php';

include_once 'includes/menu.inc.php';

?>

<style type="text/css">
@media print {
  .impressao{
    visibility: visible;
  } 
  .naoimpressao{
    visibility: hidden;
  }   
  body {
    visibility: hidden;
  }

}
</style>
<div class="impressao">
<div class="row container">
<div class="col s12">
<h5 style="color:#0d47a1">Processos</h5><hr>
<div class="naoimpressao">
<a href="processos.php" class="btn right">Novo Processo</a>
</div>
<table class="striped">
<thead>
<tr>
<th width="16%">Processo</th>
<th width="20%">Cliente</th>
<th width="20%">Reclamante</th>
<th width="10%">Situação</th>
<th width="34%">Objeto da Ação</th>
</tr>
</thead>
<tbody>
<?php include_once 'bd/procread.php'; ?>
</tbody>
</table>

</div>
</div>
</div>
<?php

include_once 'includes/footer.inc.php';

?>