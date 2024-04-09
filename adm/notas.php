<?php
include("../header.php");
$titulo	= $descripcion;
cabecera_normal();

$id = $_SESSION['id'];
$id_user = $_SESSION['id'];



$sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
$nick = $sqlnick['nick'];

$sqlavatar = mysql_fetch_array(mysql_query("SELECT avatar FROM usuarios WHERE id='$id'"));
$avatar = $sqlavatar['avatar'];

$sqlultimaip = mysql_fetch_array(mysql_query("SELECT ultimaip FROM usuarios WHERE id='$id'"));
$ultimaip = $sqlultimaip['ultimaip'];

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='$id'"));
$rango = $sqlrango['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){

?>
<link href="/images/css/definiciones.css" rel="stylesheet" type="text/css" />
<div id="cuerpocontainer">
<?php include("menu.php");?>

<div class="breadcrump">
<ul>
<li class="first"><font color="black">A&ntilde;adir Nota:</font></li><li class="last"></li>
</ul>
</div>



<div id="form_div" class="container702 floatL">

				<div class="box_txt"></div>

				<div class="box_rss"></div>
			
			<div class="box_cuerpo" id="admin_content">
			<iframe name="hit" style="display:none;"></iframe>
<a name="mda"></a>


<div style="display:none;text-align:center;" id="mensajes_div" class="ok"></div>
<form name="per" method="post" onsubmit="return load_new_avatar();" action="/adm/agregado.php">


<textarea class="agregar cuerpo" style="height:200px;" id="markItUp" name="cuerpo"></textarea>

<br />
<br><br>
<center><input type="submit" class="mBtn btnGreen" style="width:auto; margin-left: 5px" value="Compartir" title="Compatir"/></center>
<br><br>

<div id="error_data" class="emptyData" style="display: block; ">Aqu&iacute; podr&aacute;s dejarle un mensaje corto a todo el Staff pero recuerda que esta secci&oacute;n no es un chat.
<br>
Tus mensajes tienen que ser cortos y precisos. 
<br>
Si tu nota es demasiado larga mejor publicala en la comunidad S&oacute;lo Moderadores.</div></center>


<input type="hidden" name="ultimaip" value="<?=$ultimaip?>">
<input type="hidden" name="nick" value="<?=$nick?>">
<input type="hidden" name="avatar" value="<?=$avatar?>">

</form>
<br />
<br />
<center><font color="dodgerblue"><b><u>Notas Publicadas:</u></b></font><center>
<br>

<?php
	$_pagi_sql = "SELECT * FROM notas ORDER BY id DESC";
	$rs = mysql_query($_pagi_sql, $con);
	if (mysql_num_rows($rs)!=0){
?>	
				
<?php
		$_pagi_cuantos = 100; 
		include("paginator.inc.php"); 
		while($row = mysql_fetch_array($_pagi_result)){
					$id = $row['id'];
					$nick = $row['nick'];
					$avatar = $row['avatar'];
                                        $cuerpo = $row['cuerpo'];
                                        $fecha = $row['fecha'];
?>



<br />


	<div id="div_cmnt_<?=$id?>">
	<span style="display:none" id="citar_comm_41697">[b]Fuente??[/b]</span>	<div class="comentario-post clearbeta">

		<div class="avatar-box"><a href="/perfil/<?=$nick?>">
				<img style="position: relative; z-index: 1; display: inline;" class="avatar-48 lazy" src="<?=$avatar?>" orig="<?=$avatar?>" title="Avatar de <?=$nick?> en Zincomienzo!" onerror="error_avatar(this, 1161, 48)" width="48" height="48" />
			 </a>
			</div>
		<div class="comment-box">

			<div class="dialog-c">
			</div>
			<div class="comment-info clearbeta">

				<div class="floatL">
				<a class="nick" href="/perfil/<?=$nick?>"><?=$nick?></a> dijo <span title="26.04.2011 a las 14.04 hs."><?=hace($fecha)?></span>:
				</div>
				<div class="floatR answerOptions">

				
					<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="255" or $rango=="655" or $rango=="755")
	{
?>
<ul>

<li class="iconDelete"><a onclick="javascript:borrar_nota('<?=$row['id']?>')"><span class="borrar-comentario"></span></a></li>
</ul>



<?php
	
}
?>

				</div>
			</div>

			<div class="comment-content"><?=BBparse($cuerpo)?></div>
		</div>
	</div>
</div>















<?php
		}
echo'';}else{echo'<div class="emptyData">No hay notas publicadas</div>';}
?>

</div></div></div>
<div style="clear:both"></div>
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
?>