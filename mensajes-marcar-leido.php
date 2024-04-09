<?php
include("header.php");

$titulo = $descripcion;
cabecera_normal();

$sesion	= $_SESSION['id'];
$id_mensaje	= xss(no_i($_GET['ids']));
$user_id	= xss(no_i($_GET['key']));
$leido = xss(no_i($_GET['leido']));

if(empty($user_id) or empty($id_mensaje)){
fatal_error('Falta informaci&oacute;n');
}

$delmp	=	mysql_query("SELECT * FROM mensajes WHERE id_mensaje='{$id_mensaje}' ");
$rs	=	mysql_fetch_array($delmp);

echo'<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">';

if($rs['leido_receptor']=='0'){echo'
		<div class="box_txt show_error">Error</div>

		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		Hubo un error al efectuar la operaci&oacute;n 	<br />';}else

if($user_id==$sesion and $rs['id_receptor']==$sesion or $rs['id_emisor']==$sesion){

mysql_query("UPDATE mensajes SET leido_receptor='0' WHERE id_receptor='$sesion' AND id_mensaje='$id_mensaje'");

echo'<div class="box_txt show_error">Confirmaci&oacute;n</div>

	<div class="box_rrs"><div class="box_rss"></div></div>
	</div>
	<div class="box_cuerpo"  align="center">
	<br />
	Cambios aceptados 		<br />';}

if($rs['id_receptor']!=$sesion){
echo'<div class="box_txt show_error">Error</div>

		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		El mensaje no te pertenece	<br />';}
		
?>
		<br />
		<br />

	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Centro de mensajes" title="Centro de mensajes" onclick="location.href='/mensajes/'">	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ir a p&aacute;gina principal" title="Ir a p&aacute;gina principal" onclick="location.href='/'">		<br />
		
	</div>
	
</div>	
		<br />
		<br />
		<br />
		<br />
<?php
pie();
?>