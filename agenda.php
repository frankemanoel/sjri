<?php 

session_start();

$painel_atual= "admin";
require "config.php";

include_once 'includes/header.inc.php';

include_once 'includes/menu.inc.php';

?>
   
    <div class="row container">
    <p>&nbsp;</p>
    <form action="bd/agcreate.php" method="post" class="col s12">
    <fieldset class="formulario" style=" padding:15px">
    <legend><img src="imagens/cadastro.png" alt="[imagem]" width="100" /></legend>
    <h5 class="light center">Cadastro de Agenda</h5>
    
    <?php
	if(isset($_SESSION['msg'])):
	echo $_SESSION['msg'];
	session_unset();
	endif;
	?>

    <!-- CAMPO TITULO -->
        
    <div class="input-field col s8">
    <i class="material-icons prefix">event</i>
    <input type="text" name="title" id="title" maxlength="200" required autofocus />
    <label for="title">Título</label>
    </div>  
    
    <div class="input-field col s4">
    <select id="tipo" name="tipo">
      <option value="Compromissos">Compromissos</option>
      <option value="Audiencias">Audiências</option>
      <option value="Tarefas">Tarefas</option>
      <option value="Intimacoes">Intimações</option>
    </select>
    <label for="tipo">Tipo</label>
    </div>
    
    <!-- CAMPO INICIO -->
    <div class="input-field col s6">
    <i class="material-icons prefix">alarm</i>    
    <input type="date" name="inidata" id="inidata" maxlength="10" required />
    <label for="inidata">Início</label>
    </div>
    
    <!-- CAMPO INICIO HORA -->
    <div class="input-field col s6">
    <i class="material-icons prefix">alarm</i>    
    <input type="time" name="inihora" id="inihora" maxlength="10" required />
    <label for="inihora">Hora de Início</label>
    </div>    
    
    <!-- CAMPO FIM -->
    <div class="input-field col s6">
    <i class="material-icons prefix">alarm</i>    
    <input type="date" name="fimdata" id="fimdata" maxlength="10" required />
    <label for="fimdata">Fim</label>
    </div>
    
    <!-- CAMPO FIM HORA -->
    <div class="input-field col s6">
    <i class="material-icons prefix">alarm</i>    
    <input type="time" name="fimhora" id="fimhora" maxlength="10" required />
    <label for="fimhora">Hora do Fim</label>
    </div>
    
       <div class="input-field col s2 right">
              <label>
                <input name="situacao" value="1" class="with-gap" type="radio" />
                <span>Encerrado</span>
              </label>
		</div>
        
        <div class="input-field col s2 right">
              <label>
                <input name="situacao" value="0" class="with-gap" type="radio" checked />
                <span>Pendente</span>
              </label>
		</div>

 <p>&nbsp;</p>  
 <p>&nbsp;</p>   
           
    <!-- CAMPO BOTOES -->
    <div class="input-field col s12">
    <input type="submit" value="cadastrar" class="btn blue" />
    <input type="reset" value="limpar" class="btn red" />
    </div>        
    </fieldset>
    </form>
    </div>
    
    
<?php include_once 'includes/footer.inc.php' ?>

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.datepicker');
    var instances = M.Datepicker.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function(){
    $('.datepicker').datepicker();
  });
        
</script>		