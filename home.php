<?php 

session_start();

$painel_atual= "admin";
require "config.php";

include_once 'includes/header.inc.php';

include_once 'includes/menu.inc.php';

?>
<p>&nbsp;</p>

	<div class="row container">
              <?php include_once 'bd/stats.php'; ?>
              <?php include_once 'bd/agenda_stats.php'; ?>
 		<div class="col s5">    
              <?php include_once 'listagem.php'; ?>

              <?php include_once 'listagemproc.php'; ?>
        </div>

        <div class="col s7" style="margin-top:16px;">
              <?php include_once 'calendario/cal.php'; ?>
        </div>

    </div>    
        
	
   
<?php include_once 'includes/footer.inc.php'; ?>

<hr>