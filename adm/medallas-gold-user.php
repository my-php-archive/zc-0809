<?php
include("../header.php");
$titulo	=	$descripcion;
$kid	=	$_SESSION['id'];
$sql = "SELECT nick, rango FROM usuarios where id='".$kid."' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$rango = $row['rango'];
$user = $row['user'];
if($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755")
{
cabecera_normal();
?>
<script src="/admin/acciones.js" type="text/javascript"></script>
<div id="cuerpocontainer">

		


<div class="boxy xtralarge">
			<div class="boxy-title">
				<h3>Filtrar Por:</h3>

	
			</div>
			<div class="boxy-content">
<img src="/images/global-medalla.png" align="absmiddle"><a href="/adm/medallas/"> Global</a>
<br><br>
<img src="/images/medalla-moderador.png" align="absmiddle"><a href="moderador"> Moderador</a>
<br><br>
<img src="/images/medalla-administrador.png" align="absmiddle"><a href="desarrollador"> Desarrollador</a>
<br><br>
<img src="/images/medalla-great.png" align="absmiddle"><a href="great-user"> Great User</a>
<br><br>
<img src="/images/medalla-silver.png" align="absmiddle"><a href="silver-user"> Silver User</a>
<br><br>
<div class="globo-small"><span style="color: #0033CC;"><img src="/images/medalla-gold.png" align="absmiddle"><a href="gold-user"> Gold User</a></div></span>
<br><br>
<img src="/images/medalla-team.png" align="absmiddle"><a href="zincomienzo-team"> Zincomienzo Team</a>
<br><br>


<style>
.globo-small {background:#FFFFCC; border:1px solid #FFCC33; padding:5px;margin:5px 0 0 0;font-weight: bold; text-align:center;-moz-border-radius: 5px}
</style>

</div></div>

<br><br><br><br><br><center><img src="/images/logo-medallas.png"></center>
<?php include("menu.php");?>


<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3>Medallas</h3>

		
			</div>
			<div class="boxy-content">
<?php
	$_pagi_sql = "SELECT * FROM medallas WHERE causa='Gold User'";
	$rs = mysql_query($_pagi_sql, $con);
	if (mysql_num_rows($rs)!=0){
?>		
		
		<table class="linksList">
		<thead>
			<tr>
				<th>Medalla:</th>
				<th>Causa:</th>
				<th>Razon:</th>
				<th>Usuario:</th>
                                <th>Eliminar:</th>

			</tr>
		</thead>
	<tbody>
		<tbody>
<?php
		$_pagi_cuantos = 50; 
		include("paginator.inc.php"); 
		while($row = mysql_fetch_array($_pagi_result)){
					$id = $row['id'];
					$medalla = $row['medalla'];
					$usuario = $row['usuario'];
					$detalles = $row['detalles'];
					$fecha = $row['fecha'];
					$causa = $row['causa'];
?>	
<tr id="div_<?=$row['id']?>">

<td><span class="icon-medallas <?=$medalla?>"></span></td>
<td><?=$causa?></td>
<td><?=$detalles?></td>
<td><?php
$lala = "select * from usuarios where id = ".$row['usuario']."";
$lelele = mysql_query($lala);
while($lela = mysql_fetch_assoc($lelele)){
echo'<a href="/perfil/'.$lela['nick'].'">'.$lela['nick'].'</a>';
}
?></td>
<td><a id="change_status" onclick="javascript:borrar_medalla('<?=$row['id']?>')" title="Borrar la Medalla"><img src="<?=$images?>/borrar.png" align="absmiddle"></a></td>
	


</tr>
<?php
		}
echo'</tbody>
		</tbody>
	</table>';}else{echo'<div class="emptyData"> No hay Medallas </div>';}
?>
</tbody>
		</tbody>
	</table>
	
<center><?php echo "".$_pagi_navegacion."";?></center>





	

</div>
		</div></div>
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
	background: #d9d9d9 url('/images/bg-title-boxy.gif') repeat-x top left;
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
	background-image:url('/images/sprite-notification.png');
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