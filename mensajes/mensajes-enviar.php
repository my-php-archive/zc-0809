<?php
$resp = null;
require_once("../recaptcha/recaptchalib.php");
include('../header.php');
$titulo	= $descripcion;
cabecera_normal();
$key = $_SESSION['id'];
$public_key = $public_key;
$msg_to = xss(no_i($_POST["msg_to"]));
$msg_subject =xss(no_i($_POST["msg_subject"]));
$msg_body =xss(no_i($_POST["msg_body"]));
$recaptcha_response_field = xss(no_i($_POST["recaptcha_response_field"]));

$recaptcha_challenge_field = xss(no_i($_POST["recaptcha_challenge_field"]));
$resp = recaptcha_check_answer($private_key,$_SERVER["REMOTE_ADDR"],$recaptcha_challenge_field,$recaptcha_response_field);

$mod	=	"SELECT *
			FROM usuarios
			WHERE id='$key'";
$moder	=	mysql_query($mod, $con);
$moder2	=	mysql_fetch_array($moder);

if(empty($msg_subject)){
	$msg_subject = '(Sin Titulo)';
}

if($_SESSION['user']==$msg_to){
die('<script>alert("No es posible enviarse mensajes a s\u00ED mismo.\nNadie te envia mensajes? Visit\u00E1 nuestro CHAT y encontr\u00E1 nuevos amigos!")</script> <SCRIPT LANGUAGE="javascript"> location.href = "redactar/";</SCRIPT>');
}

$minuto = $moder2['ultimaaccion2'] + (60);
$sqlflood=mysql_query("SELECT id FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND id='{$key}'");
if(mysql_num_rows($sqlflood)){
	fatal_error('No podes realizar tantas acciones en tan poco tiempo. Vuelve a intentarlo en unos instantes ','Volver','history.go(-1)','Anti-Flood!');
}

if($key==null){
	fatal_error('Para ingresar a esta secci&oacute;n es necesario autentificarse.');
}

if(empty($msg_to)){
	fatal_error('Especifica un Receptor','Volver','history.go(-1)');
}



if(empty($msg_body)){
	fatal_error('Especifica un Mensaje','Volver','history.go(-1)');
}


 if ($moder2['rango']==11){

if(empty($recaptcha_response_field)){
	fatal_error('Completa el c&oacute;digo de seguridad.','Volver','history.go(-1)');
}

if(!$resp->is_valid){
	fatal_error('El c&oacute;digo es incorrecto','Volver','history.go(-1)');
}
}

$sqlv = mysql_query("SELECT id FROM usuarios WHERE nick = '".$msg_to."' ");

if (!mysql_num_rows($sqlv)) {
	fatal_error('El usuario especificado no existe','Volver','history.go(-1)');
}

mysql_query("UPDATE usuarios SET ultimaaccion2=unix_timestamp() WHERE id='$key'");
$newmsg = mysql_fetch_array($sqlv);
$para_id = $newmsg['id'];

mysql_query("INSERT INTO mensajes (id_emisor, id_receptor, asunto, contenido, fecha) VALUES ('$key', '$para_id', '$msg_subject', '$msg_body', NOW())");
$idm = mysql_insert_id();

echo '<div id="cuerpocontainer">
<div class="container400" style="margin: 10px auto 0 auto;">
<div class="box_title">
<div class="box_txt show_error">OK</div>
<div class="box_rrs"><div class="box_rss"></div></div>
</div>
<div class="box_cuerpo"  align="center">
<br />Mensaje enviado<br /><br /><br />
<input type="button" class="mBtn btnOk" style="font-size:13px" value="Centro de mensajes" title="Centro de mensajes" onclick="location.href=\'/mensajes/\'">	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ir a p&aacute;gina principal" title="Ir a p&aacute;gina principal" onclick="location.href=\'/\'"><br />
</div>
</div>	
<br /><br /><br /><br />';
pie();
?>