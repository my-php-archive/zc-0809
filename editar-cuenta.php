<?php
include("header.php");
$titulo	=	"Perfil Editado!";  
cabecera_normal();
?>


<?php
$id = $_POST['ida'];

$id = no_i($_POST['id'], ENT_QUOTES, "UTF-8");
$nombre = no_i($_POST['nombre'], ENT_QUOTES, "UTF-8");
$mail = no_i($_POST['mail'], ENT_QUOTES, "UTF-8");
$ciudad = no_i($_POST['ciudad'], ENT_QUOTES, "UTF-8");
$region = no_i($_POST['region'], ENT_QUOTES, "UTF-8");
$sitio_web = no_i($_POST['sitio_web'], ENT_QUOTES, "UTF-8");
$mensajero = no_i($_POST['mensajero'], ENT_QUOTES, "UTF-8");
$avatar = no_i($_POST['avatar'], ENT_QUOTES, "UTF-8");
$nick = no_i($_POST['nick'], ENT_QUOTES, "UTF-8");
$pais = no_i($_POST['pais'], ENT_QUOTES, "UTF-8");
$empresa = no_i($_POST['empresa'], ENT_QUOTES, "UTF-8");
$mensaje = no_i($_POST['mensaje'], ENT_QUOTES, "UTF-8");

mysql_query("UPDATE usuarios SET id = '$id', nombre = '$nombre',mail = '$mail',ciudad = '$ciudad',sitio_web = '$sitio_web', mensajero = '$mensajero', avatar = '$avatar', nick = '$nick', pais = '$pais', empresa = '$empresa', mensaje = '$mensaje', region = '$region' WHERE id = $id");
$causa = $_POST['causa'];
$contenido = "Hola, tu cuenta ha sido editada <br>
Causa:<b> ".$causa."</b>
<br> Gracias Atte: Zincomienzo Staff";
$asunto = "Cuenta editada";
mysql_query("INSERT INTO `zincomie_zinco`.`mensajes` (`id_mensaje`, `id_emisor`, `id_receptor`, `asunto`, `contenido`, `papelera_emisor`, `papelera_receptor`, `eliminado_emisor`, `eliminado_receptor`, `id_carpeta`, `leido_emisor`, `leido_receptor`, `fecha`, `fecha_papelera`) VALUES (NULL, '821', '{$id}', '{$asunto}', '{$contenido}', '0', '0', '0', '0', '0', '0', '0', NOW(), NOW());");
echo '';


?> 

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">Hecho!</div>
		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>

	<div class="box_cuerpo"  align="center">
		<br />
		La cuenta ha sido modificada satisfactoriamente! IMPORTANTE: Los cambios ser&aacute;n aplicados en menos de 1 minuto.<br />
		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ir a la p&aacute;gina principal" title="Ir a p&aacute;gina principal" onclick="location.href='/'">		<br />
		
	</div>

	
</div>	
		<br />
		<br />
		<br />
		<br />
	<div style="clear:both"></div>
<!-- fin cuerpocontainer -->




<?php
pie();
?>