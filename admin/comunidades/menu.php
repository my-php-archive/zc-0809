<?php
if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){
?>
<script src="<?=$url?>/admin/acciones.js?7.0" type="text/javascript"></script>
<link href="<?=$url?>/admin/cssadm.css?2.0" rel="stylesheet" type="text/css" />
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="menu-tabs clearfix">
<div align="center">
<ul>
		<li<?php if($direccion[1]=="admin" and $direccion[2]=="comunidades" and $direccion[3]==""){echo' class="selected"';}?>><a href="<?=$url?>/admin/comunidades"><img src="<?=$images?>/inicio.png" height="17" width="17" title="Ir al panel principal" align="absmiddle"> Inicio</a></li>
		<li<?php if($direccion[3]=="comunidades-denunciadas"){echo' class="selected"';}?>><a href="<?=$url?>/admin/comunidades/comunidades-denunciadas"><img alt="Comus. Denunciadas" src="<?=$images?>/denunciar.png" title="Comunidades Denunciadas" align="absmiddle"> Denunciadas</a></li>
<?php
if ($rango=="255")
{
?>		
   <li<?php if($direccion[3]=="comunidades-oficiales"){echo' class="selected"';}?>><a href="<?=$url?>/admin/comunidades/comunidades-oficiales"><img alt="Comus. ofic." src="<?=$images?>/oficial.png" height="17" width="18" title="Comunidades Oficiales" align="absmiddle"> Oficiales</a></li>
<?php
}
?>
		<li<?php if($direccion[3]=="temas-elim"){echo' class="selected"';}?>><a href="<?=$url?>/admin/comunidades/temas-elim"><img alt="Temas Eliminadas" src="<?=$images?>/cerrar.png" title="Temas Eliminadas" align="absmiddle"> Temas Eliminados</a></li>
		<li<?php if($direccion[3]=="comunidades-eliminadas"){echo' class="selected"';}?>><a href="<?=$url?>/admin/comunidades/comunidades-eliminadas"><img alt="Comus. Eliminadas" src="<?=$images?>/cerrar.png" title="Comunidades Eliminadas" align="absmiddle"> Comunidades Eliminadas</a></li>
	</ul>
</div>
</div>
<br>
<?php
}
?>