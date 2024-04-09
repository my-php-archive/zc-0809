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




if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){
$titulo	=	$descripcion;




?>

<div id="cuerpocontainer">

<?php include("menu.php");?>
		<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3>Estadisticas</h3>

				<span class="icon-noti popular-n"></span>
			</div>
			<div class="boxy-content">
				


				
 <?php

$ca=mysql_query("SELECT count(*) as cantidad FROM comentariosdefi");
$coa=mysql_fetch_array($ca);

$ce=mysql_query("SELECT count(*) as cantidad FROM comentariosimg");
$coe=mysql_fetch_array($ce);

$ci=mysql_query("SELECT count(*) as cantidad FROM categorias");
$cat=mysql_fetch_array($ci);

$co=mysql_query("SELECT count(*) as cantidad FROM c_comunidades");
$cou=mysql_fetch_array($co);

$cu=mysql_query("SELECT count(*) as cantidad FROM c_respuestas");
$res=mysql_fetch_array($cu);

$mb=mysql_query("SELECT count(*) as cantidad FROM acciones");
$mbz=mysql_fetch_array($mb);

$poz=mysql_query("SELECT count(*) as cantidad FROM borradores");
$pos=mysql_fetch_array($poz);

$cmz=mysql_query("SELECT count(*) as cantidad FROM comentarios");
$com=mysql_fetch_array($cmz);

$su=mysql_query("SELECT count(*) as cantidad FROM c_subscategorias");
$sub=mysql_fetch_array($su);

$te=mysql_query("SELECT count(*) as cantidad FROM c_temas");
$tem=mysql_fetch_array($te);

$de=mysql_query("SELECT count(*) as cantidad FROM definiciones");
$def=mysql_fetch_array($de);

$fa=mysql_query("SELECT count(*) as cantidad FROM favoritos");
$fav=mysql_fetch_array($fa);

$fo=mysql_query("SELECT count(*) as cantidad FROM imagenes");
$fot=mysql_fetch_array($fo);

$me=mysql_query("SELECT count(*) as cantidad FROM medallas");
$med=mysql_fetch_array($me);

$mp=mysql_query("SELECT count(*) as cantidad FROM mensajes");
$mep=mysql_fetch_array($mp);


$cone=mysql_query("SELECT * FROM usuarios WHERE ultimaaccion>unix_timestamp()-2*60 ORDER BY ultimaaccion DESC");
$conez=mysql_num_rows($cone);




echo "


<img src='/images/actividades-esta.png'><b> Actividades:</b> ".$mbz['cantidad']."
<br><hr>
<img src='/images/borradores-cate.png'><b> Borradores:</b> ".$pos['cantidad']."
<br><hr>
<img src='/images/categorias-esta.png'><b> Categorias:</b> ".$cat['cantidad']."
<br><hr>
<img src='/images/comentarios-esta.png'><b> Comentarios:</b> ".$com['cantidad']."
<br><hr>
<b>Comentarios Definiciones:</b> ".$coa['cantidad']."
<br><hr>
<b>Comentarios Fotos:</b> ".$coe['cantidad']."
<br><hr>
<b>Comunidades:</b> ".$cou['cantidad']."
<br><hr>
<b>Comunidades Respuestas:</b> ".$res['cantidad']."
<br><hr>
<b>Subscategorias:</b> ".$sub['cantidad']."
<br><hr>
<b>Temas:</b> ".$tem['cantidad']."
<br><hr>
<b>Definiciones:</b> ".$def['cantidad']."
<br><hr>
<b>Favoritos:</b> ".$fav['cantidad']."
<br><hr>
<b>Fotos:</b> ".$fot['cantidad']."
<br><hr>
<b>Medallas:</b> ".$med['cantidad']."
<br><hr>
<b>Mensajes Privados:</b> ".$mep['cantidad']."

";


?>





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