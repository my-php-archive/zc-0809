<?php
require_once("../../header.php");
echo'
<div id="borrar-tema" class="form-container">
	<div id="error_data" class="warningData" style="display:none"></div>
	
	<div class="data">
		<label>ID del Tema<span class="color_red">*</span></label>
        <div class="desform">Ejemplo: <b>6</b><br>'.$url.'/comunidades/ZC/<b>6</b>/Estatus-de-Zincomienzo.html</div>
		<input class="c_input" id="idte" />
	</div>
	<div class="data">
		<label>Raz&oacute;n<span class="color_red">*</span></label>
		<div class="desform">Escribe la Raz&oacute;n por el cual estas eliminando el Tema.
		<input class="c_input" id="razon" />
	</div>

	<span style="float:left"><span class="color_red">*</span>Obligatorio</span>

</div>';
?>