<?php 
session_start();

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
<h5 style="color:#0d47a1">Agenda</h5><hr>
<div class="naoimpressao">
<a href="agenda.php" class="btn right">Novo Compromisso</a>
</div>
<table class="striped">
<thead>
<tr>
<th>Titulo</th>
<th>Início</th>
<th>Fim</th>
</tr>
</thead>
<tbody>
<?php include_once 'bd/agread.php'; ?>
</tbody>
</table>

</div>
</div>
</div>
<?php

include_once 'includes/footer.inc.php';

?>