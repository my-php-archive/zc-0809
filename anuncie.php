<?php
include("header.php");

$nombre = xss(no_i($_POST['nombre']));
$email = xss(no_i($_POST['email']));
$empresa = xss(no_i($_POST['empresa']));
$telefono = xss(no_i($_POST['telefono']));
$horario = xss(no_i($_POST['horario']));
$presupuesto = xss(no_i($_POST['presupuesto']));
$comentarios = xss(no_i($_POST['comentarios']));

$sql = "INSERT INTO anunciate (nombre, mail, empresa, telefono, horario_contc, presupuesto, comentarios) ";
$sql.= "VALUES ('$nombre', '$email', '$empresa', '$telefono', '$horario', '$presupuesto', '$comentarios')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);
$num = $ult_id;
$titulo	= $descripcion;
cabecera_normal();
?>

<div id="cuerpocontainer">
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">OK</div>
		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		Mensaje enviado	Pronto Estaremos En Contacto   <br />

		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ir a p&aacute;gina principal" title="Ir a p&aacute;gina principal" onclick="location.href=\'/\'">		<br />
		
	</div>
	
</div>	
		<br />
		<br />
		<br />

		<br />
<?
pie();
?>