<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();
if($_SESSION['user']!=null)
{
include('cuenta/menu.php');
echo"
<script>
function validate_data()
{
	var f=document.forms.per;
	if(f.password.value=='')
	{
		f.password.focus();
		alert('Ingresa tu password actual');
		return false;
	}

	if(f.password1.value != f.password2.value)
	{
		f.password1.focus();
		alert('El password y la verificaci&oacute;n no son iguales');
		return false;
	}

	if(f.password1.value.length < 6 || f.password1.value.length >32)
	{
		f.password1.focus();
		alert('La clave debe contener entre 6 y 32 caracteres');
		return false;
	}

	return true;
}
</script>
<div id='form_div'>
<div class='container702 floatR'>
<div class='box_title'>
<div class='box_txt cuenta_cambiar_pass'>Cambiar password</div>
<div class='box_rss'></div>
</div>
<div class='box_cuenta'>
<form name='per' method='post' onsubmit='return validate_data();' action='password-cambiar.php'>
<table width='100%' cellpadding='4'>
<tr>
<td width='25%' align='right' valign='top'><b>Password Actual:</b></td>
<td width='42%'><input type='password' size='30' maxlength='32' name='password' /></td>
</tr>
<tr>
<td width='25%' align='right' valign='top'><b>Nuevo password:</b></td>
<td width='42%'><input type='password' size='30' maxlength='32' name='password1' /></td>
</tr>
<tr>
<td width='25%' align='right' valign='top'><b>Confirmaci&oacute;n nuevo password:</b></td>
<td width='42%'><input type='password' size='30' maxlength='32' name='password2' /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td class='color_red'>* Todos los campos son obligatorios</td>
</tr>
<tr>
<td colspan='3' align='center'><hr />Al modificar mi password tambi&eacute;n acepto los <a href='/terminos-y-condiciones/' target='_blank'>T&eacute;rminos de uso</a> y la <a href='/privacidad-de-datos/' target='_blank'>pol&iacute;tica de privacidad de datos</a>.</td>
</tr>
<tr>
<td colspan='3' align='center'>
<input type='submit' class='button' style='font-size:15px' value='Cambiar mi password' title='Cambiar mi password'>
</td></tr></table></form></div></div></div><br clear='left'><hr />
";
}
else
{
$titulo_error	=	"Atenci&oacute;n";
$mensaje_error	=	"Para editar tus datos necesit&aacute;s autentificarte";
$boton_error	=	"Ir a p&aacute;gina principal";
error();
}
pie();
?>