<?php 

include("../header.php");
$titulo	= $descripcion;
cabecera_normal();

$id = $_SESSION['id'];
$id_user = $_SESSION['id'];



$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='$id'"));
$rango = $sqlrango['rango'];
$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];
$sqlpuntosdar = mysql_fetch_array(mysql_query("SELECT puntosdar FROM usuarios WHERE id='$id'"));
$puntosdar = $sqlpuntosdar['puntosdar'];
$sqlultimaip = mysql_fetch_array(mysql_query("SELECT ultimaip FROM usuarios WHERE id='$id'"));
$ultimaip = $sqlultimaip['ultimaip'];
$sqlavatar = mysql_fetch_array(mysql_query("SELECT avatar FROM usuarios WHERE id='$id'"));
$avatar = $sqlavatar['avatar'];
$sqlpuntosdar = mysql_fetch_array(mysql_query("SELECT puntosdar FROM usuarios WHERE id='$id'"));
$puntosdar = $sqlpuntosdar['puntosdar'];



if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){
$titulo	=	$descripcion;




?>

<style>
.box_info {background: #edeff4;width: 180px;padding: 7px;border: 1px solid #d8dfea;}
</style>



<div id="cuerpocontainer">



	
	

<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3><center>Informaci&oacute;n de tu Cuenta</center></h3>

				
			</div>
			<div class="boxy-content">

<div class="box_info">

<center><a href="/perfil/<?=$nick?>"><img src="<?=$avatar?>" alt="" onerror="error_avatar(this)" width="80" height="80"/></a></center>
<br>
<b> Nick:</b> <?=$nick?>
<br>
<b> Puntos Disponibles:</b> <?=$puntosdar?>
<br>
<b> IP: </b> <?=$ultimaip?>
<br>
<b> Rango: </b><?=rngo($rango)?>



</div></div></div>
<br><br><br><br><center><img src="/images/logo-adm-new.png"></center>
<?php include("menu.php");?>
		









<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3><center>Breve descripci&oacute;n de tu labor como Moderador</center></h3>

				<span class="icon-noti popular-n"></span>
			</div>
			<div class="boxy-content">
				
					
	










<hr class="divider">
<b><center>&nbsp;&nbsp;Aqu&iacute; encontrar&aacute;s una breve explicaci&oacute;n de lo que ver&aacute;s en el panel de Moderaci&oacute;n.</li>

<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/usuario.png" align="absmiddle" vspace="2">&nbsp;&nbsp;Ver usuarios:
<br>
En esta secci&oacute;n encontraras una lista de los usuarios registrados, los puedes ordenar por ID, Nick, IP, E-mail, Rango, Puntos, Pa&iacute;s; tambi&eacute;n tienes varias opciones como por ejemplo:
<br>
<br>
<span class="color_green">
&raquo;&nbsp;Cambiar de rango a los usuarios<br>
&raquo;&nbsp;Dar puntos a los usuarios<br>

&raquo;&nbsp;Quitar puntos a los usuarios<br>
&raquo;&nbsp;Suspender y reactivar usuarios </span>
<br>
<br>
Para los moderadores El e-mail de los usuarios est&aacute; oculto para proteger la privacidad de los usuarios.<br>
(Disponible s&oacute;lamente para administradores)</li>
<hr class="divider">

<li><img src="http://www.zincomienzo.net/images/sticky.png" align="absmiddle" vspace="2">&nbsp;&nbsp;Stickys:
<br>
Son los post importantes donde se informa a los usuarios sobre constantes actualizaciones, concursos, tambien se puede poner en sticky alg&uacute;n post que le haya sido &uacute;til a la web sobre tutoriales, etc.
<br>
<br>
Los moderadores no deben abusar de sus privilegios y poner en sticky cualquier post, inclusive si es de ellos y no tiene nada que ver con <?=$comunidad?>, ya que se les podr&iacute;a retirar el rango.
</li>
<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/baneados-negado-icon.png" align="absmiddle" vspace="2">&nbsp;&nbsp;Usuarios suspendidos:
<br>

Aqu&iacute; encontrar&aacute;s a los usuarios que han sido suspendidos, desde aqu&iacute; los podr&aacute;s suspenderlos y reactivarlos.
<br>
Las causas de suspensi&oacute;n m&aacute;s frecuentes que deber&aacute;s utilizar son:
<br>
<br>
<span class="color_red">
&raquo;&nbsp;Hacer spam

<br>
&raquo;&nbsp;Insultar a la web o a los usuarios
<br>
&raquo;&nbsp;Se detectaron cuentas clones
<br>
&raquo;&nbsp;Postear contenido inapropiado
<br>
&raquo;&nbsp;Otra (especificar)
</span>
<br>
<br>
Antes de dar suspensi&oacute;n alguna, deben advertir por MP a el usuario que esta causando problemas en <?=$comunidad?> y si &eacute;ste procede a hacer caso omiso a la advertencia, se le suspende permanente o temporalmente seg&uacute;n se de el caso o la gravedad de la situaci&oacute;n.

<br>
<br>
Los moderadores no deben abusar de sus privilegios y suspender sin raz&oacute;n alguna a los usuarios y a otros moderadores, de lo contrario se les podr&iacute;a retirar el rango y suspender permenentemente.
</li>
<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/denuncias-icon.png" align="absmiddle" vspace="2">&nbsp;&nbsp;Denuncias:
<br>
Es la secci&oacute;n que m&aacute;s usar&aacute;s sin duda, aqu&iacute; encontrar&aacute;s y revisar&aacute;s una lista de denuncias hechas por los usuarios.

<br>
<br>
<span class="color_green">Si la denuncia es correcta, aceptas la denuncia con el icono <img src="http://www.zincomienzo.net/images/acept.gif" border="0"> y despu&eacute;s la cierras con el icono <img src="http://www.zincomienzo.net/images/cerrar.png" border="0">.<br>(El Post denunciado es borrado, el MP es enviado y los 3 puntos son sumados autom&aacute;ticamente despu&eacute;s de aceptar la denuncia)</span>
<br>
<br>
<span class="color_red">Si la denuncia es incorrecta, rechazas la denuncia con el icono <img src="http://www.zincomienzo.net/images/rechazar.png" border="0"> y despu&eacute;s la cierras con el icono <img src="http://www.zincomienzo.net/images/cerrar.png" border="0">.<br>(El MP es enviado y los 3 puntos son restaods autom&aacute;ticamente despu&eacute;s de rechazar la denuncia la denuncia)</span>

<br>
<br>
<span class="color_blue">Si la denuncia es correcta pero el post s&oacute;lo debe ser editado, solamente cierras la denuncia con el icono <img src="http://www.zincomienzo.net/images/cerrar.png" border="0">.<br>(El Post denunciado lo debes editar t&uacute; deacuerdo a cual sea la raz&oacute;n de la denuncia, aqu&iacute; no se restan ni se suman puntos por denunciar)</span>
</li>
<hr class="divider">
<li><img src="http://www.zincomienzo.net/images/post-elim-icon.png" align="absmiddle" vspace="2">&nbsp;&nbsp;Post eliminados:
<br>
Aqu&iacute; encontrar&aacute;s una lista de los &uacute;ltimos posts que han sido eliminados, tienes la opci&oacute;n de reactivarlos si la raz&oacute;n de la eliminaci&oacute;n del post fue incorrecta.

<br>
<br>
Los moderadores no deben abusar de sus privilegios y eliminar sin raz&oacuten alguna los post, de lo contrario se les podr&iacute;a retirar el rango.</b></center>
</strong>
</font>
<hr class="divider">
</li>		


</div>
		</div></div>


<div style="clear:both"></div>

<!-- fin cuerpocontainer -->
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
.xtralarge2 {
	width: 702px;
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


<?php
	pie();
	}
	else{
	  echo file_get_contens($url."/404.php");
	}
	mysql_close();
?>