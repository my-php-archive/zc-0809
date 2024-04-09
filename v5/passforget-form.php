<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
if($_SESSION['id']==null){
?><div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<script>
function validate_data()
{
	var f=document.forms.pass;

	var fit='email'.split(',');
	for(var i=0; i<fit.length; i++)
	{
		if(f[fit[i]].value=='')
		{
			alert('El campo ' + fit[i] + ' es obligatorio..');
			f[fit[i]].focus();
			return false;
		}
	}
	if($('#recaptcha_response_field').val()==''){
		alert('El campo captcha es obligatorio.');
		$('#recaptcha_response_field').focus();
		return false;
	}
} /* validate_data() */
</script>
	<div id="form_div">
		<div class="container940">
			<div class="box_title">
				<div class="box_txt recuperar_pass">Recuperar mi password</div>
				<div class="box_rrs">
					<div class="box_rss"></div>

				</div>
			</div>
			<div class="box_cuerpo">	
				<center>
				<br />
				<b class="size13">Completa tu e-mail y te enviaremos las instrucciones para cambiar tu clave</b>
				<br />
				<br />
				<form onsubmit="return validate_data();" name="pass" action="/password-recuperar-enviado.php" method="post">

					<table width="500" border="0"  cellpadding="2" cellspacing="4">
						<tr>
							<td width="30%" align="right"><strong>E-mail:</strong></td>
							<td ><input type="text" size="25" name="email" tabindex="1" /></td>
						</tr>
						<tr>
							<td align="right"><strong>C&oacute;digo de la im&aacute;gen:</strong></td>

							<td>
								<script type="text/javascript">var RecaptchaOptions={theme:"clean", lang:"es", tabindex:"2", custom_theme_widget:"recaptcha_widget"};</script>
<script type="text/javascript" src="http://api.recaptcha.net/challenge?k=<?=$public_key?>"></script>
<noscript>
<iframe src="http://api.recaptcha.net/noscript?k=<?=$public_key?>" height="300" width="500" frameborder="0"></iframe><br/>
<textarea name="recaptcha_challenge_field" rows="3" cols="40"></textarea>
<input type="hidden" name="recaptcha_response_field" value="manual_challenge"/>
</noscript>							</td>
						</tr>
					</table>
					<br />
					<input type="submit" value="Aceptar" tabindex="3" />
				</form>
				<br />
				<br />
				</b>
				</div>
			</div>
		</div>
<?php
}else{
fatal_error('los usuarios registrados no pueden ver esta secci&oacute;n');
}
pie();
?>