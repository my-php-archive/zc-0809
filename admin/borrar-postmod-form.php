<?php
require_once("../header.php");
?>







<div id="borrar-post" class="form-container">
	<div id="error_data" class="warningData" style="display:none"></div>
	
	
		<input type="hidden" class="c_input" id="idpost" value="<?=$_GET['postid']?>" />
	
	<div class="data">
		<label>Causa<span class="color_red">*</span></label>
		<div class="desform">Escribe por qu&eacute; estas eliminando este post.
		<input class="c_input" id="razon" />
	</div>

	<center><b><font color="red">Causas de eliminaci&oacute;n recomendadas</font></b></center>
<br>
<center><hr>No cumple con el protocolo
<br>
<hr>
Post demasiado pobre / Crap
<br>
<hr>
Es gore o asqueroso
<br>
<hr>
Tiene links muertos
<br>
<hr>
Va en comunidades
<br>
<hr>
Sin fuente
<br>
<hr>
Spam
<hr></center>
</div>


