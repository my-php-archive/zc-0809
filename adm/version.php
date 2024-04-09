<?php 

include("../header.php");
$titulo	= $descripcion;
cabecera_normal();

$id = $_SESSION['id'];
$id_user = $_SESSION['id'];

if(empty($id_user)){
fatal_error('<b>Se te perdio algo ?</b> <img src="/images/quehaces.png">','Ir a la p&aacute;gina principal','location.href=\'/\'','Que Haces ?');}
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='$id'"));
$rango = $sqlrango['rango'];
$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];
$sqlpuntosdar = mysql_fetch_array(mysql_query("SELECT puntosdar FROM usuarios WHERE id='$id'"));
$puntosdar = $sqlpuntosdar['puntosdar'];
$sqlultimaip = mysql_fetch_array(mysql_query("SELECT ultimaip FROM usuarios WHERE id='$id'"));
$ultimaip = $sqlultimaip['ultimaip'];



if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){
$titulo	=	$descripcion;




?><div id="cuerpocontainer">

<?php include("menu.php");?>
		<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3>Algunos datos de la web...</h3>

				<span class="icon-noti popular-n"></span>
			</div>
			<div class="boxy-content">
<style>
.box_info {background: #edeff4;width: 660px;padding: 7px;border: 1px solid #d8dfea;}
.publi {background: #FFF;border: 1px solid #b4bbcd;width: 650px;height: 50px;resize:none;}
.publi2 {background: #FFF;border: 1px solid #b4bbcd;width: 150px;height: 15px;resize:none;}
.publi3 {background: #FFF;border: 1px solid #b4bbcd;width: 210px;height: 15px;resize:none;}
</style>

	
<div class="box_info">

<center><br>
<div class="size13"><b style="color:#FF0000">Formato de la programaci&oacute;n usada:</b> PHP,MYSQL,AJAX,CSS,HTML,CRON JOBS.</div>

<br>
<div class="size13"><b style="color:#FF0000">Hosteada por: </b><a href="http://byethost.com/paid-hosting">Byethost Premium</a></div>

<br>
<div class="size13"><b style="color:#FF0000">Creada por: </b>Leandro Altamirano (<a href="/perfil/Lean18">Lean18</a>)</div>

<br>
<div class="size13"><b style="color:#FF0000">Versi&oacute;n: </b> 4.0</div>

<br>
<b style=>Due&ntilde;o:</b> <a href="/perfil/Lean18">Lean18</a> 
<br><br>
<b style=>Desarrollador:</b> <a href="/perfil/Timbalentimba">Timbalentimba</a>
<br><br>
<b style=>Administrador:</b> <a href="/perfil/Ficer">Ficer</a>
</div></center>






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
	mysql_close();
?>