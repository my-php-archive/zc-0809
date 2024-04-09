<?php
require_once("../../header.php");
echo'
<div id="borrar-com" class="form-container">
	<div id="error_data" class="warningData" style="display:none"></div>
	
	<div class="data">
		<label>Shortname<span class="color_red">*</span></label>
        <div class="desform">Ejemplo: <b>DG</b><br>'.$url.'/comunidades/<b>DG</b>/</div>
		<input class="c_input" id="idco" />
	</div>

	<span style="float:left"><span class="color_red">*</span>Obligatorio</span>

</div>';
?>