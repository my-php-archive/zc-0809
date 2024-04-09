<?php
include("header.php");

$titulo = $descripcion;
cabecera_normal();

$sesion	= $_SESSION['id'];
$id_mensaje	= no_injection($_GET['ids']);
$user_id	= no_injection($_GET['key']);

if(empty($user_id) or empty($id_mensaje)){
fatal_error('Falta informaci&oacute;n');
}

$delmp	=	mysql_query("SELECT * FROM mensajes WHERE id_mensaje='{$id_mensaje}' ");
$rs	=	mysql_fetch_array($delmp);

echo'<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">';

if($rs['papelera_receptor']=='1' and $rs['id_receptor']==$sesion or $rs['id_emisor']==$sesion){echo'
		<div class="box_txt show_error">Error</div>

		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		Hubo un error al eliminar		<br />';}else

if($user_id==$sesion and $rs['id_receptor']==$sesion or $rs['id_emisor']==$sesion){
echo'<div class="box_txt show_error">Confirmaci&oacute;n</div>

	<div class="box_rrs"><div class="box_rss"></div></div>
	</div>
	<div class="box_cuerpo"  align="center">
	<br />
	Los mensajes han sido marcados como eliminados y estar&aacute;n disponibles por 30 d&iacute;as en la carpeta de Mensajes Eliminados.		<br />';
mysql_query("UPDATE mensajes SET papelera_receptor='1' WHERE id_receptor='$sesion' AND id_mensaje='$id_mensaje'");}

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