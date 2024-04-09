<?php
$resp = null;
require_once("recaptcha/recaptchalib.php");
require_once("header.php");
$privatekey = $private_key;
$nick = xss(no_i($_POST["nick"]));
$password1 = no_i($_POST["password"]);
$password2 = no_i($_POST["password2"]);
$email = xss(no_i($_POST["email"]));
$dia = xss(no_i($_POST["dia"]));
$mes = xss(no_i($_POST["mes"]));
$ano = xss(no_i($_POST["anio"]));
$sexo = xss(no_i($_POST["sexo"]));
$pais =xss(no_i($_POST["pais"]));
$provincia = xss(no_i($_POST["provincia"]));
$ciudad = xss(no_i($_POST["ciudad"]));
$noticias =xss(no_i($_POST["noticias"]));
$terminos = xss(no_i($_POST["terminos"]));
$ip = no_i($_SERVER['REMOTE_ADDR']);

$recaptcha_challenge_field = xss(no_i($_POST["recaptcha_challenge_field"]));
$recaptcha_response_field =xss(no_i($_POST["recaptcha_response_field"]));
$resp = recaptcha_check_answer($privatekey,$ip,$recaptcha_challenge_field,$recaptcha_response_field);


if(empty($nick)){
	die('nick: El campo es requerido');
}
if(empty($password1)){
	die('password: El campo es requerido');
}
if(empty($email)){
	die('email: El campo es requerido');
}

$sqlu = mysql_query("SELECT nick FROM usuarios WHERE nick='$nick'");
if(mysql_num_rows($sqlu)){
	die('nick: El nombre de usuario ya se encuentra registrado por otra persona');
}
if($nick==$password1){
	die('password: La contrase&ntilde;a tiene que ser distinta que el nick');
}

if(empty($email)){
	die('email: El formato es incorrecto');
}

$sqle = mysql_query("SELECT mail FROM usuarios WHERE mail='$email'");
if(mysql_num_rows($sqle)){
	die('email: El email ya est&aacute; en uso');
}

if(empty($dia) or empty($mes) or empty($ano)){
	die('nacimiento: El campo es requerido');
}

if(empty($sexo)){
	die('sexo: El campo es requerido');
}
if(empty($provincia)){
	die('provincia: El campo es requerido');
}
if(empty($ciudad)){
	die('ciudad: El campo es requerido');
}
if(empty($recaptcha_challenge_field) or empty($recaptcha_response_field)){
	die('recaptcha: El campo es requerido');
}
if(!$resp->is_valid){
	die('recaptcha: El c&oacute;digo es incorrecto');
}


$id_session = md5(uniqid(rand(), true));
mysql_query("INSERT INTO usuarios (id_extreme,activacion,ban,rango,nick,password,puntos,puntosdar,mail,pais,ciudad,sexo,dia,mes,ano,fecha,numposts,numcomentarios,avatar) VALUES('{$id_session}','0','0','11','{$nick}','".md5($password1)."','0','0','{$email}','{$pais}'
,'{$ciudad}','{$sexo}','{$dia}','{$mes}','{$ano}',unix_timestamp(),'0','0','http://www.zincomienzo.net/images/avatar.gif')");
$emailserver="webmaster@zincomienzo.net";
$asunto="ZINCOMIENZO.NET: Confirmacion de email";

$mensajeserver="
<div style='background: none repeat scroll 0% 0% #0F7DC1; padding: 10px; font-family: Arial,Helvetica,sans-serif; color: #000000;'>
	<img src='{$images}/logo-mail.gif' alt='Zincomienzo!'>
		<div style='background: none repeat scroll 0% 0% #FFFFFF; padding: 10px; font-size: 14px;'>
			<h2 style='font-family: Arial,Helvetica,sans-serif; color: #000000; font-size: 22px;'>Hola {$nick}</h2>

<p style='font-family: Arial,Helvetica,sans-serif; color: #000000;'>

&iexcl;Te damos la bienvenida a Zincomienzo.net!

</p><p>

Para finalizar con el proceso por favor confirma tu direcci&oacute;n de email haciendo click aqu&iacute;: 
<a href='{$url}/verify_email/{$id_session}' target='_blank'>{$url}/verify-email/{$id_session}</a>

</p><p>

Antes de empezar a realizar comentarios e interactuar en la comunidad te recomendamos que visites el protocolo de el sitio. 
(link a <a href='{$url}/protocolo/' target='_blank'>{$url}/protocolo/</a>)

</p><p>

Esperamos que disfrutes enormemente tu visita.

</p><p>

&iexcl;Muchas gracias!

</p><p>

Staff de {$comunidad}.

</p>
<div style='border-top: 1px solid #CCCCCC; padding: 10px 0pt;'>
			<span style='color: #666666; font-size: 11px;'>				
			</span> 
		</div>
	</div>
</div>";

$encabezados = "From: ".$comunidad." <".$emailserver.">\nReply-To: ".$emailserver."\nContent-Type: text/html; charset=utf-8"; 
mail($email, $asunto, $mensajeserver, $encabezados);
die('1: Te hemos enviado un correo a <b>'.$email.'</b> con los &uacute;ltimos pasos para finalizar con el registro.<br><br>Si en los pr&oacute;ximos minutos no lo encuentras en tu bandeja de entrada, por favor, revisa tu carpeta de correo no deseado, es posible que se haya filtrado.<br><br>&iexcl;Muchas gracias!');

?>