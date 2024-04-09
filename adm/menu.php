<script src="/admin/acciones.js" type="text/javascript"></script>

<div class="right" style="float:left;margin-left:0px;width:985px">

		

<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Panel de Moderaci&oacute;n</h3>

			
			</div>
			<div class="boxy-content">
<hr class="divider">
<img src="/images/inicio.png" align="absmiddle" height="17" width="18"/> <a href="/adm" class="m-menu">Home</a> <br />

<img src="/images/usuario.png" align="absmiddle" /> <a href="/adm/usuarios" class="m-menu">Ver usuarios</a><br />

<img src="/images/protocolo-icon.png" align="absmiddle" /> <a href="/adm/protocolo"  class="m-menu">Protocolo de Moderaci&oacute;n</a><br />

<hr>
<img src="/images/icon-editar-personales.png" align="absmiddle" /> <a href="/adm/contactantes" class="m-menu">Contactantes</a> <br />
<img src="/images/icon-avatar.png" align="absmiddle" /> <a href="/adm/anunciantes" class="m-menu">Anunciantes</a><br />

<hr>

<img src="/images/denuncias-icon.png" align="absmiddle" /> <a href="/adm/denuncias"  class="m-menu">Posts denunciados</a> <br />

<img src="/images/denuncia-u.png" align="absmiddle" /> <a href="/adm/denuncias-usuarios"  class="m-menu">Usuarios denunciados</a><br />

<img src="/images/denuncias-ico-pu.png" align="absmiddle" /> <a href="/adm/denuncias-pub"  class="m-menu">Denuncias p&uacute;blicas</a><br />

<hr>

<img src="/images/post-elim-icon.png" align="absmiddle" /> <a href="/adm/borrar-posts"  class="m-menu">Posts eliminados</a><br />

<img src="/images/baneados-negado-icon.png" align="absmiddle" /> <a href="/adm/usuarios-suspendidos" class="m-menu">Usuarios suspendidos</a><br />
	
<hr>    

<img src="/images/staff-icon.png" align="absmiddle" /> <a href="/adm/staff"  class="m-menu">Miembros del Staff</a><br />	

<img src="/images/rangos-adm-icon.png" align="absmiddle" /> <a href="/adm/rangos"  class="m-menu">Lista de rangos</a><br />

<hr>

<img src="/images/sticky.png" align="absmiddle" /> <a href="/adm/stickys"  class="m-menu">Stickys</a><br />

<img src="/images/notas-icon.png" align="absmiddle" /> <a href="/adm/notas"  class="m-menu">Notas</a><br />

<hr>

<img src="/images/rangos-estadisticas-icon.png" align="absmiddle" /> <a href="/adm/estadisticas-rangos"  class="m-menu">Estadisticas de rangos </a><br />	

<hr>

<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="255" or $rango=="655" or $rango=="755")
	{
?>

<img src="/images/estadisticas-icon.png" align="absmiddle" /> <a href="/adm/estadisticas"  class="m-menu">Estadisticas de la web</a><br />	

<img src="/images/version.png" align="absmiddle" /> <a href="/adm/version"  class="m-menu">Versi&oacute;n de Zincomienzo!</a><br />

<img src="/images/publicidad-icon.png" align="absmiddle" /> <a href="/adm/publicidad"  class="m-menu">Agregar Publicidad</a><br />

<hr>

<img src="/images/noticias-form.png" align="absmiddle" /> <a href="/adm/noticias"  class="m-menu">Publicar noticias</a><br />

<img src="/images/oldMsg.png" align="absmiddle" /> <a href="/adm/mensajes-privados" class="m-menu">MPs enviados y recibidos</a><br />

<img src="/images/quitar-medalla.png" align="absmiddle" /> <a href="/adm/medallas/"  class="m-menu">Quitar medallas<br /></a>

<hr>

<img src="/images/advertencia-icono.png" align="absmiddle" /> <a href="/adm/advertir"  class="m-menu">Enviar advertencias</a><br />

<img src="/images/post-elim-icon.png" align="absmiddle" /> <a href="/adm/borrar_posts-multiples.php"  class="m-menu">Borrador masivo</a><br />

<img src="/images/banear-ip.png" align="absmiddle" /> <a href="/adm/ban-ip"  class="m-menu">Banear IPs</a><br />

<hr class="divider">


<?php
}
?>





</div>
		</div>

<style>
.boxy {
	background: #FFF;
	border: 1px solid #CCC;
	-moz-box-shadow: 0 0 5px #CCC;
	-webkit-box-shadow: 0 0 5px #CCC
}
.boxy a {
	color: #0f0fb4;
	font-weight: bold;
}
.boxy a.selected {
	background-color:#0F0FB4;
	color:#FFFFFF;
	display:block;

	margin:3px 0;
	padding:3px;
}
.boxy-title {
	background: #d9d9d9 url('<?=$images?>/images/bg-title-boxy.gif') repeat-x top left;
	padding: 10px;
	border-bottom: #bdbdbd 1px solid;
	position: relative;
}
.boxy-title h3 {
	margin: 0;
	text-shadow: #f4f4f4  0 1px 0;
	font-size:13px;
}

.boxy-title span.icon-noti {
	background-image:url('<?=$images?>/images/sprite-notification.png');
	display:block;
	float:right;
	height:16px;
	position:absolute;
	right:9px;
	top:8px;
	width:16px;
}

.boxy-content {
	padding: 12px;
}
.boxy select {
	width: 125px;
}
.boxy h4 {
	color: #FF6600;
	margin: 0 0 5px 0;
	font-size: 14px;
}
.boxy hr {
	border-top: dashed 1px #CCC;
	background: #FFF;
	margin: 10px 0;
}
.xtralarge {
	width: 228px;
	margin: 0 5px 10px 0px;
	float: left;
}
.xtralarge ol {
	padding-left:30px;
	margin:0;
	list-style-image:none;
	list-style-position:outside!important;
	list-style-type:decimal;
	position:relative;
}

.xtralarge .categoriaPost, .xtralarge .categoriaUsuario, .xtralarge .categoriaCom {
	font-size: 12px;
	list-style-image:none;
	list-style-position:outside!important;
	list-style-type:decimal;	
	font-weight: bold;
	margin-bottom: 3px;
	display:list-item;
	position:relative;
	border:none;
	height:16px
}

.xtralarge .categoriaCom {
	padding: 3px;
}

.xtralarge .categoriaPost {
	margin-bottom: 0;
	_list-style:none
}

.xtralarge .categoriaPost:hover {
	background-color:none!important;
}



.xtralarge .categoriaPost a, .xtralarge .categoriaUsuario a, .xtralarge .categoriaCom a {
	font-size: 12px;
	font-weight: bold;
	width:250px;
	height:16px;
	overflow:hidden;
	margin:0;
	display:block;
	padding:0
	height:auto!important;
	position:absolute;
	float:none;
}

.xtralarge .categoriaPost span, .xtralarge .categoriaUsuario span, .xtralarge .categoriaCom span {
	font-weight: normal;
	color: #999;
	position:absolute;
	right:0;
	top:0
}

.xtralarge .categoriaUsuario  {
	padding:3px;
}

 .xtralarge .categoriaUsuario a {
 	left: 25px;
 	top:3px;
 	height:16px;
 }

.xtralarge .categoriaCom {
	height:13px;
}

.xtralarge .categoriaCom .titletema {
	margin:0
}
.xtralarge .categoriaUsuario img {

	vertica-align:middle;
	padding:1px;
	border:1px solid #EEE;
	display:block;
	margin-right:5px;
	position:absolute;	
}

.boxy-title .popular-n { background-position:0 -240px; }
.boxy-title .votada-n { background-position:0 -261px; }


</style>
