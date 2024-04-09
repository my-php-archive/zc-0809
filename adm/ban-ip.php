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



	<?php include("menu.php");?>
		









<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3>Banear IPs</h3>

				
			</div>
			<div class="boxy-content">
				
<center>			
<hr class="divider">
<b>Aca podras banear la IPs de los usuarios que realicen acciones perjudicantes para la web por ejemplo:
<hr class="divider">

<font color="red">Molestar compulsivamente a la web.</font>
<br>
<font color="red">Realizar spam masivo y/o extremo.</font>
<br>
<font color="red">Intentar "hackear" u otro metodo para lograr desequilibrar el funcionamiento de la web.</font>
<br>
<font color="red">Hacerle alg&uacute;n mal a un usuario y/o a la web en general.</font>
</b>

<br><br></center>


<form method="post" action="banadmin.php?x=add">



<style>
.box_info {background: #edeff4;width: 660px;padding: 7px;border: 1px solid #d8dfea;}
.publi {background: #FFF;border: 1px solid #b4bbcd;width: 650px;height: 50px;resize:none;}
.publi2 {background: #FFF;border: 1px solid #b4bbcd;width: 150px;height: 15px;resize:none;}
.publi3 {background: #FFF;border: 1px solid #b4bbcd;width: 210px;height: 15px;resize:none;}
</style>

	
<div class="box_info">




  
<br>
<center><h2><b>IP:</b></h2> <input class="publi2" name="ip"> <br /> 

<h2><b>Causa:</b></h2> <input class="publi3" name="reason"> <br /> 
<br>
<hr />
<input class="mBtn btnDelete" style="width:auto; margin-left: 5px" type="submit" name="add" value="Suspender IP">
<hr />
</center>
</div>




</form>

<br>
<hr class="divider">
<center><font color="red"><b>ATENCI&Oacute;N:</font> Al banear la IP el usuario quedar&aacute; completamente sin acceso al sitio.</b></font></center>
<hr class="divider">

<br><br>


<?php
	$_pagi_sql = "SELECT * FROM banned ORDER BY id DESC";
	$rs = mysql_query($_pagi_sql, $con);
	if (mysql_num_rows($rs)!=0){
?>		
		
		<table class="linksList">
		<thead>
			<tr>

				<th>IP:</th>
				<th>Razon:</th>
				<th>Reactivar:</th>
			</tr>
		</thead>
	<tbody>
		<tbody>
<?php
		$_pagi_cuantos = 100; 
		include("paginator.inc.php"); 
		while($row = mysql_fetch_array($_pagi_result)){
					$id = $row['id'];
					$ip = $row['ip'];
					$reason = $row['reason'];

?>	
<tr id="div_<?=$row['id']?>">


<td><?=$ip?></td>

<td><?=$reason?></td>

<td><a id="change_status" onclick="javascript:borrar_ip('<?=$row['id']?>')" title="Reactivar IP"><img src="<?=$images?>/deletea.png" align="absmiddle"></a></td>
	</tr>
<?php
		}
echo'</tbody>
		</tbody>
	</table>';}else{echo'<div class="emptyData">No hay IPs baneadas hasta el momento.</div>';}
?>
</tbody>
		</tbody>
	</table>
	
	


</div></div></div>










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