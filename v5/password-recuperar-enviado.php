<?php
include("header.php");
$titulo	=	$descripcion;
cabecera_normal();

$email = xss(no_i($_POST['email']));

if(empty($email)){
fatal_error('Faltan datos');}

$rs = mysql_query("SELECT id,nick,mail,id_extreme FROM usuarios WHERE mail='$email'");

if(!mysql_num_rows($rs)){
fatal_error('No existe un usuario con esa direcci&oacute;n de email','Volver','history.go(-1)');
}else{

$row = mysql_fetch_array($rs);

$id = $row['id'];
$nick = $row['nick'];
$id_extreme = $row['id_extreme'];

$emailserver = "{$email_server}";
$asunto = "{$comunidad}: Recuperar Password";
$mensajeserver = "
<div style='background: none repeat scroll 0% 0% #0F7DC1; padding: 10px; font-family: Arial,Helvetica,sans-serif; color: #000000;'>
	<img src='{$images}/logo-mail.gif' alt='Downgrade!'>
	<div style='background: none repeat scroll 0% 0% #FFFFFF; padding: 10px; font-size: 14px;'>
		<h2 style='font-family: Arial,Helvetica,sans-serif; color: #000000; font-size: 22px;'>Hola, {$nick}!</h2>
<p style='font-family: Arial,Helvetica,sans-serif; color: #000000;'>

{$comunidad} te env&iacute;a un mensaje. Por favor, lee con atenci&oacute;n.

</p><p>

Recibimos una solicitaci&oacute;n de cambio de contrase&ntilde;a. Para confirmar tu nueva contrase&ntilde;a haz click en el siguiente link:<br>
<a href='{$url}/password-recuperar-email-form.php?key={$id_extreme}&id={$id}' target='_blank'>{$url}/password-recuperar-email-form.php?key={$id_extreme}&id={$id}</a>

</p><p>

Si tienes problemas para ingresar a tu cuenta con la nueva contrase&ntilde;a env&iacute;enos un mail a esta direcci&oacute;n:<br>
<a href='mailto:zincomienzo@hostingrd.net'>zincomienzo@hostingrd.net</a>

</p><p>

Por favor, ignora este mensaje en el caso que no nos hayas enviado un cambio de contrase&ntilde;a de tu cuenta.

</p><p>

Saludos,

</p><p>

El Equipo de {$comunidad}.

</p>
<div style='border-top: 1px solid #CCCCCC; padding: 10px 0pt;'>
			<span style='color: #666666; font-size: 11px;'>				
			</span> 
		</div>
	</div>
</div>";

$encabezados = "From: ".$comunidad." <".$emailserver.">\nReply-To: ".$emailserver."\nContent-Type: text/html; charset=utf-8"; 
mail($email, $asunto, $mensajeserver, $encabezados);

fatal_error('Se envi&oacute; un mensaje con instrucciones a la direcci&oacute;n de email especificada','Ir a p&aacute;gina principal','location.href=\'/\'','Atenci&oacute;n');}

pie();
?>