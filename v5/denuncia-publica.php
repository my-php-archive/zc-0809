<?php
include("header.php");

$nombre	= xss(no_i($_POST['nombre']));
$mail = xss(no_i($_POST['email']));
$warl = xss(no_i($_POST['post']));
$razon = xss(no_i($_POST['razon']));
$cuerpo	= xss(no_i($_POST['comentarios']));

$sql = "INSERT INTO p_denuncias (url, nombre, mail, razon, fecha, comentarios) VALUES ('$warl', '$nombre', '$mail', '$razon', unix_timestamp(), '$cuerpo')";
$rs = mysql_query($sql, $con);
$ult_id = mysql_insert_id($con);

$titulo	= $descripcion;
cabecera_normal();
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">Denuncia Enviada</div>
		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>

	<div class="box_cuerpo"  align="center">
		<br />
		Muchas gracias la denuncia se ha enviado correctamente.<br />		<br />
		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Volver" title="Volver" onclick="history.go(-2)">			<br />
		
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