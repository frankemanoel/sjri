<?php

session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';

$painel_atual= "admin";

?>

<div class="row container">
<div class="col s12">

<h5 class="light">Edição de Compromissos</h5><hr>

</div>
</div>

<?php

 include_once 'bd/conexao.php';
 $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 $_SESSION['id'] = $id;
 $querySelect = $link->query("select * from events where id='$id'");
 
 while($registros = $querySelect->fetch_assoc()):
 $title 			= $registros['title'];
 $color 		= $registros['color'];
 $start 		= $registros['start']; 
 $end 		= $registros['end'];
 endwhile;
?>

   <div class="row container">
    <p>&nbsp;</p>
    <form action="bd/agupdate.php" method="post" class="col s12">
    <fieldset class="formulario" style=" padding:15px">
    <legend><img src="imagens/cadastro.png" alt="[imagem]" width="100" /></legend>
    <h5 class="light center">Alteração</h5>
    
    <!-- CAMPO TITULO -->
    <div class="input-field col s8">
    <i class="material-icons prefix">event</i>
    <input type="text" name="title" value="<?php echo $title ?>" id="title" maxlength="200" autofocus />
    <label for="nome">Título</label>
    </div> 
    
    <!-- CAMPO COR -->
    <div class="input-field col s4">
    <i class="material-icons prefix">color_lens</i>
    <input type="text" name="color" id="color" value="<?php echo $color ?>" maxlength="10" />
    <label for="nome">Cor</label>
    </div>
    
    <!-- CAMPO INICIO -->
    <div class="input-field col s6">
    <i class="material-icons prefix">alarm</i>
    <input type="text" name="start" id="start" value="<?php echo $start ?>" maxlength="50" />
    <label for="nome">Início</label>
    </div>

    <!-- CAMPO FIM -->    
    <div class="input-field col s6">
    <i class="material-icons prefix">alarm</i>    
    <input type="text" name="end" id="end" value="<?php echo $end ?>" maxlength="50" />
    <label for="nome">Fim</label>
    </div>        


    <!-- CAMPO BOTOES -->
    <div class="input-field col s12">
    <input type="submit" value="alterar" class="btn blue" />
    <a href="conagenda.php" class="btn red">cancelar</a>
    </div>

        
    </fieldset>
    </form>
    </div>


<?php

include_once 'includes/footer.inc.php';

?>