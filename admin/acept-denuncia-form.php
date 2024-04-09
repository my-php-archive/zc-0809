<div id="acept-denuncia" class="form-container">
	<div id="error_data" class="warningData" style="display:none"></div>
		<input type="hidden" class="c_input" id="denun" value="<?=$_GET['denunciante']?>" />
		<input type="hidden" class="c_input" id="idpost" value="<?=$_GET['postid']?>" />
	<div class="data">

		<label>Causa<span class="color_red">*</span></label>
<div class="desform">Escribe por qu&eacute; estas eliminando este post.</div>
		<input value="<?=$_GET['id']?>"  class="c_input" id="razon" />
	<br><br>
	</div>
<div class="desform">Importante: Los puntos y el MP ser&aacute;n enviados autom&aacute;ticamente.</div><br><br>
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