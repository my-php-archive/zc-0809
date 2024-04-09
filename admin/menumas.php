<?php
if ($rango=="255" or $rango=="655" or $rango=="755"){
?>
<script src="<?=$url?>/admin/acciones.js?7.0" type="text/javascript"></script>
<link href="<?=$url?>/admin/cssadm.css?2.0" rel="stylesheet" type="text/css" />
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="menu-tabs clearfix">
<div align="center">
<ul>
		<li<?php if($direccion[1]=="admin" and $direccion[2]==""){echo' class="selected"';}?>><a href="/admin"><img src="<?=$images?>/inicio.png" height="17" width="18" title="Ir al panel principal" align="absmiddle"> Inicio</a></li>
		<li<?php if($direccion[2]=="anunciantes"){echo' class="selected"';}?>><a href="/admin/anunciantes"><img alt="Anunciantes" src="<?=$images?>/icon-email-open.png" title="Anunciantes" align="absmiddle"> Anunciantes</a></li>
		<li<?php if($direccion[2]=="contactantes"){echo' class="selected"';}?>><a href="/admin/contactantes"><img alt="Contactantes" src="<?=$images?>/icon-escribir-mensaje.gif" title="Contactantes" align="absmiddle"> Contactantes</a></li>
		<li<?php if($direccion[2]=="denuncias-pub"){echo' class="selected"';}?>><a href="/admin/denuncias-pub"><img alt="Denuncias" src="<?=$images?>/denunciar.png" title="Denuncias Publicas" align="absmiddle"> Denuncias Pub.</a></li>	
	        <li<?php if($direccion[2]=="http://Www.zincomienzo.net/puntinesxday18.php"){echo' class="selected"';}?>><a href="http://Www.zincomienzo.net/puntinesxday18.php"><img alt="Denuncias" src="<?=$images?>/add.png" title="Recargar Puntos" align="absmiddle"> Recargar Puntos</a></li>	
</ul>
</div>
</div>
<br>
<?php
}
?>
