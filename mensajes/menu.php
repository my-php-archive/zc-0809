<?php

include('../includes/configuracion.php');

$id_user = $_SESSION['id'];

$mens=mysql_query("SELECT m.id_mensaje, m.leido_receptor, m.id_receptor FROM (mensajes AS m) WHERE m.id_receptor='".$_SESSION['id']."' AND m.leido_receptor='0'");
$mensn=mysql_num_rows($mens);
echo'


<script src="'.$images.'/js/es/mensajes.js?1.1" type="text/javascript"></script>
 <div class="container230 floatL">
	<div class="box_title"><div class="box_txt mensajes_carpetas">Carpetas</div><div class="box_rss"/>
	</div></div>
	<div class="box_cuerpo">
		<img src="'.$images.'/icon-mensajes-recibidos.gif" align="absmiddle" /> <a href="/mensajes/" class="m-menu">Mensajes Recibidos</a> ';if($mensn!=0){echo'  ('.$mensn.')';}echo'<br />
		<img src="'.$images.'/icon-mensajes-enviados.gif" align="absmiddle" /> <a href="/mensajes/enviados/" class="m-menu">Mensajes Enviados</a><br />

		<img src="'.$images.'/icon-mensajes-eliminados.gif" align="absmiddle" /> <a href="/mensajes/eliminados/" class="m-menu">Mensajes Eliminados</a><br /><br />
			<img src="'.$images.'/icon-escribir-mensaje.gif" align="absmiddle" /> <a href="/mensajes/redactar/"  class="m-menu">Escribir mensaje</a><br /><br />
		Carpetas personales:<br />';
$rs = mysql_query("SELECT * FROM carpmp WHERE user_creator='".$_SESSION['id']."'");
if(!mysql_num_rows($rs)){echo'
No hay carpetas creadas.<br /><br />';}
while($rows = mysql_fetch_array($rs)){echo'
		<img src="'.$images.'/icon-mensajes-carpeta.gif" align="absmiddle">  <a href="/mensajes/carpetas_personales/'.$rows['name'].'" class="m-menu">'.$rows['name'].'</a> <a href="#" title="Opciones de la carpeta" onclick="mensajes_show_opciones_carpeta(\''.$rows['id'].'\',\''.$id_user.'\');return false;"><img src="'.$images.'/icon-mensajes-carpeta-opc.gif" align="absmiddle" border="0"></a>
		<div id="opciones_carpeta_'.$rows['id'].'" style="display: none;"></div>
    <br>';}echo'

<div id="crear_carpeta_link" onclick="mensajes_crear_carpeta_form(1);return false;" onmouseover="this.style.cursor=\'pointer\'">+ Crear carpeta<br /><br /></div>
<div id="crear_carpeta_div" style="display:none">
<form method=post action="/mensajes-carpeta-crear.php">
Crear nueva carpeta:<br />
<input type="text" name="carpeta_nombre" size="30" /><br />
<input type="hidden" name="key" value="'.$key.'" /><input style="margin-top:5px;" class="button" type="submit" value="Crear carpeta" /> <input style="margin-top:5px;" class="button" type="button" value="Cancelar" onclick="mensajes_crear_carpeta_form(0)" />
</form>
</div>

</div>
</div> ';
?>