<?php
if ($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755"){
?>
<script src="<?=$url?>/admin/acciones.js?7.0" type="text/javascript"></script>
<link href="<?=$url?>/admin/cssadm.css?2.0" rel="stylesheet" type="text/css" />
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="menu-tabs clearfix">
<div align="center">
<ul>
		<li<?php if($direccion[1]=="admin" and $direccion[2]==""){echo' class="selected"';}?>><a href="/admin" title="Ir al panel principal"><img alt="Inicio" src="<?=$images?>/inicio.png" height="17" width="18" align="absmiddle"> Inicio</a></li>
		<li<?php if($direccion[2]=="usuarios"){echo' class="selected"';}?>><a href="/admin/usuarios" title="Usuarios"><img alt="Usuarios" src="<?=$images?>/usuario.png" align="absmiddle"> Usuarios</a></li>	
		<li<?php if($direccion[2]=="stickys"){echo' class="selected"';}?>><a href="/admin/stickys" title="Agregar un Sticky"><img alt="Sticky" src="<?=$images?>/sticky.png" align="absmiddle"> Stickys</a></li>
		<li<?php if($direccion[2]=="usuarios-suspendidos"){echo' class="selected"';}?>><a href="/admin/usuarios-suspendidos" title="Usuarios Suspendidos"><img alt="Suspendidos" src="<?=$images?>/ban.gif" align="absmiddle"> Suspendidos</a></li>
		<li<?php if($direccion[2]=="denuncias"){echo' class="selected"';}?>><a href="/admin/denuncias" title="Denuncias Realizadas"><img alt="Denuncias" src="<?=$images?>/denunciar.png" align="absmiddle" > Denuncias</a></li>
	    <li<?php if($direccion[2]=="borrar-posts"){echo' class="selected"';}?>><a href="/admin/borrar-posts" title="Borrar Post"><img alt="Eliminar" src="<?=$images?>/cerrar.png" align="absmiddle"> Borrar Post</a></li>
<?php
if ($rango=="255"){
?>	
		<li<?php if($direccion[2]=="mas"){echo' class="selected"';}?>><a href="/admin/mas" title="M&aacute;s Opciones"><img alt="M&aacute;s" src="<?=$images?>/add.png" vspace="3" align="absmiddle"> M&aacute;s Opciones</a></li>
<?php
}
?>
	</ul>
  </div>
</div>
<br>
<?php
}
?>
