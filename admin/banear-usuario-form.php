<div id="baneo" class="form-container">
	<div id="error_data" class="warningData" style="display:none"></div>
	<div class="data">
		<label>Usuario<span class="color_red">*</span></label>
		<input class="c_input" id="usuario" value="<?=$_GET['nick']?>" />
	</div>
	<div class="data">
		<label>Causa<span class="color_red">*</span></label>

		<input class="c_input" id="razon" />
	</div>

	<div class="data">
		<label>Duraci&oacute;n<span class="color_red">*</span></label><select id="finbaneo">
<?php
for($i = 1; $i<= 30; $i++){
    echo'<option value="'.$i.'">'.$i.' D&iacute;as</option>';	
}
?>
<option value="per">Indefinido</option>
</select>
</option>
<br>
<br>
<center><b><font color="red">Causas de suspenci&oacute;n recomendadas</font></b></center>
<br>
<center><hr>Se detectaron cuentas clones
<br>
<hr>
Postear contenido inapropiado
<br>
<hr>
Hacer spam
<br>
<hr>
Usuario troll
<br>
<hr>
Insultar
<br>
<hr>
Otra (especificar)
<hr></center>
</div>