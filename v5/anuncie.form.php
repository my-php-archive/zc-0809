<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
?><div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script>
function validate_data(){
	var f=document.forms.Fdenuncia;
	var fit='nombre,email,comentarios'.split(',');
	for(var i=0; i<fit.length; i++){
		if(f[fit[i]].value==''){
			alert('El campo ' + fit[i] + ' es obligatorio.');
			f[fit[i]].focus();
			return false;
		}
	}
	if($('#recaptcha_response_field').val()==''){
		alert('El campo captcha es obligatorio.');
		$('#recaptcha_response_field').focus();
		return false;
	}
}
</script>
<div class="container600" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt anuncie">Anuncie en <?=$comunidad?></div>
		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>
	<div class="box_cuerpo" style="font-size:12px">Si desea anunciar en <?=$comunidad?> o ser un patrocinador por favor complete el siguiente formulario que nos pondremos en contacto con usted.		<br />

		<br />
		<br />
		<form onsubmit="return validate_data();" name="Fdenuncia" action="/anuncie.php" method="post" style="text-align:center;">
			<b>Su nombre:</b>
			<br />
			<input type="text" size="30" name="nombre" tabindex="1" />
			<br />			
			<br />
			<b>E-mail:</b>

			<br />
			<input type="text" size="30" name="email" tabindex="2" />
			<br />			
			<br />
			<b>Empresa:</b>
			<br />
			<input type="text" size="30" name="empresa" tabindex="3" />
			<br />			
			<br />

			<b>Tel&eacute;fono:</b>
			<br />
			<input type="text" size="30" name="telefono" value="" tabindex="4" />
			<br />
			<br />
			<b>Horarios de contacto</b>
			<br />

			<input type="text" size="20" name="horario" tabindex="5" />
			<br />
			<br />
			<b>Presupuesto mensual (estimado)</b>
			<br />
      <select name="presupuesto" tabindex="6">
        <option value="No seleccionado" selected>Seleccionar Presupuesto</option>
				<option value="Menos de $100.00">Menos de $100.00</option>

				<option value="$100.00 - $1,000.00">$100.00 - $1,000.00</option>
				<option value="$1,000.00 - $10,000.00">$1000.00 - $10,000.00</option>
				<option value="M&aacute;s de $10,000.00">M&aacute;s de $10,000.00</option>      
      </select>
      <br />
      <br />
			<b>Comentarios:</b>

			<br />
			<textarea name="comentarios" cols="40" rows="5" tabindex="7"></textarea>
      <br />
      <br />
			<b>C&oacute;digo de la im&aacute;gen:</b>
			<br />
			<center>

<script type="text/javascript">var RecaptchaOptions={theme:"clean", lang:"es", tabindex:"8", custom_theme_widget:"recaptcha_widget"};</script>
<script type="text/javascript" src="http://api.recaptcha.net/challenge?k=<?=$public_key ?>"></script>
<noscript>
<iframe src="http://api.recaptcha.net/noscript?k=<?=$public_key?>" height="300" width="500" frameborder="0"></iframe><br/>
<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
<input type="hidden" name="recaptcha_response_field" value="manual_challenge"/>
</noscript>			</center>
			<br />
			<br />
			<input type="submit" class="login" style="font-size:11px" value="Enviar" title="Enviar" tabindex="9" />
			<br />
		</form>

	</div>
</div><div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<?php
pie();
?>