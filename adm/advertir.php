<?php

include("../header.php");
$titulo	= $descripcion;
cabecera_normal();

$id = $_SESSION['id'];
$id_user = $_SESSION['id'];

if(empty($id_user)){
fatal_error('<b>Busca algo mejor que hacer.</b>','Ir a la p&aacute;gina principal','location.href=\'/\'','CHAN!!');}
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='$id'"));
$rango = $sqlrango['rango'];
$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];
$sqlpuntosdar = mysql_fetch_array(mysql_query("SELECT puntosdar FROM usuarios WHERE id='$id'"));
$puntosdar = $sqlpuntosdar['puntosdar'];
$sqlultimaip = mysql_fetch_array(mysql_query("SELECT ultimaip FROM usuarios WHERE id='$id'"));
$ultimaip = $sqlultimaip['ultimaip'];



if ($rango=="255" or $rango=="655" or $rango=="755"){
$titulo	=	$descripcion;




?><div id="cuerpocontainer">

<?php include("menu.php");?>
		<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3>Enviar advertencias a usuarios</h3>

				<span class="icon-noti popular-n"></span>
			</div>
			<div class="boxy-content">
				









<form action="advertencia.php" method="post">


<style>
.box_info {background: #edeff4;width: 660px;padding: 7px;border: 1px solid #edeff4;}
.publi {background: #FFF;border: 1px solid #b4bbcd;width: 80px;height: 15px;resize:none;}
.publi2 {background: #FFF;border: 1px solid #b4bbcd;width: 500px;height: 30px;resize:none;}
</style>
	
<div class="box_info">
  
<br>

<center><h2><b>ID del Usuario:</b></h2> <textarea class="publi" name="id"></textarea> <br /></center>
<br>
<center><h2><b>Causa:</b></h2> <textarea class="publi2" name="cuerpo"></textarea> <br /></center>





<br>
<hr class="divider">
<center><input type="submit" class="mBtn btnDelete" style="width:auto; margin-left: 5px" value="Enviar Advertencia" title="Enviar Advertencia"/></center>
<hr class="divider">
</div>




<div class="clearfix"></div>

		</div>

		<div class="content-tabs perfil" style="display: none">
			<h3 onclick="cuenta.chgsec(this)" class="active">1. M&aacute;s sobre mi</h3>
			<fieldset>
				<div class="alert-cuenta cuenta-2">
				</div>
				<div class="field">
<input type="text" name="emisor" value="<?=$id?>" />


<h2><b>Asunto:</b></h2> <textarea class="publi2" name="asunto">Has recibido una advertencia</textarea>
<br />
<h2><b>Contenido:</b></h2> <textarea class="publi" name="cuerpo" id="markItUp">
El Staff de Zincomienzo te envi&oacute; este mensaje para advertirte de tu mal actuar.

Causa:

Esperamos que reconsideres esto, y puedas seguir disfrutando de la web. 

Gracias.
</textarea>
<br />






</div>


</form>








</span>

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