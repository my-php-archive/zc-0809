<?php
include("header.php");
$nombre		=	xss(no_i($_POST['nombre']));
$mail		=	xss(no_i($_POST['email']));
$empresa    =	xss(no_i($_POST['empresa']));
$telefono	=	xss(no_i($_POST['telefono']));
$horario	=	xss(no_i($_POST['horario']));
$cuerpo		=	xss(no_i($_POST['comentarios']));

$sql = "INSERT INTO contacto (nombre, mail, empresa, telefono, horario, comentarios, fecha) ";
$sql.= "VALUES ('$nombre','$mail','$empresa', '$telefono', '$horario', '$cuerpo', NOW())";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);
$num = $ult_id;

$titulo	= $descripcion;
cabecera_normal();
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">Mensaje enviado!</div>
		<div class="box_rrs"><div class="box_rss"></div></div>

	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		Muchas gracias, el mensaje se ha enviado correctamente.<br />		<br />
		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Volver" title="Volver" onclick="location.href='/'">			<br />

		
	</div>
	
</div>	
		<br />
		<br />
		<br />
		<br />
	<div style="clear:both"></div>
<?php
pie();
?>