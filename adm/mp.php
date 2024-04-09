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

$u = $_GET['u'];
$searchb = $_GET['search_by'];



?>
<div id="cuerpocontainer">
<?php include("menu.php");?>

		


<div class="boxy xtralarge2">
			<div class="boxy-title">
				<h3>MPs enviados y recibidos</h3>

				<span class="icon-noti follow-n"></span>
			</div>
			<br />
<hr>
			<center><b>Coloca Nick o ID</b>
<form action="mp.php" method ="get" align="center"></center>
		
		<center><input type="text" name="u" value="<?=$u?>"><br> <b>Filtrar por:</b></center>
			  <br>
			  <center><b>ID:</b><input type="radio" name="search_by" value="id" <?php echo ($searchb=="id") ? 'checked="id"' : ""; ?>> <b>NICK:</b><input type="radio" name="search_by" value="nick" <?php echo ($searchb=="nick") ? 'checked="checked"' : ""; ?>></center>
<br />
			  <center><input title="Buscar por emisor" value="Buscar por emisor" class="mBtn btnOk" type="submit"></center>
			</form>
<hr>
			
			<div class="boxy-content">
		
		
		<table class="linksList">
		<thead>
			<tr>
				<th>Emisor:</th>
				<th>Receptor:</th>
				<th>Asunto:</th>
				<th>Contenido:</th>
 				<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="255" or $rango=="655" or $rango=="755")
	{

?><th>Acciones:</th><?php
	
}
?>                              

			</tr>
		</thead>
	<tbody>
		<tbody>
<?php
    $_pagi_sql = "SELECT * FROM mensajes ";

    if(isset($u)){
        function getidu($nick){
		   $sql = mysql_query("SELECT * FROM usuarios WHERE nick = '$nick'");
		   $coc = mysql_fetch_assoc($sql);
		   return $coc['id'];
		}
		switch($searchb){
		 case "id":
		 $idsd = $u;
         break;
         default;
         case "nick":
         $idsd = getidu($u);
		 break;		 
		}
      		
	  $_pagi_sql.= "WHERE id_emisor = '$idsd' ";
    }
    $_pagi_sql.="ORDER BY id_mensaje DESC ";
		$rs = mysql_query($_pagi_sql, $con) or die("adsfsdfdsf".mysql_error());
	if (mysql_num_rows($rs)>0)
	{
?>
<?php
		$_pagi_cuantos = 30; 
		include("paginator.inc.php"); 
		while($row = mysql_fetch_array($_pagi_result))
		{

			?>	
	<tr>
	

<tr id="div_<?=$row['id_mensaje']?>">





<td style="text-align: left;"><?php
        $lala = "select * from usuarios where id = ".$row['id_emisor']."";
         $lelele = mysql_query($lala);
         while($lela = mysql_fetch_assoc($lelele)){
           echo'<a href="http://www.zincomienzo.net/perfil/'.$lela['nick'].'">'.$lela['nick'].'</a>';
         }
        ?></a></td>
		<td> <?php
         $lalala = "select * from usuarios where id = ". $row['id_receptor']."";
         $lelelele = mysql_query($lalala);
         while($lelalo = mysql_fetch_assoc($lelelele)){
           echo'<a href="/perfil/'.$lelalo['nick'].'">'.$lelalo['nick'].'</a>';
         }
       ?></td>
	
		<td><?=$row['asunto'];?></td>
		<td><?=mpcontenido($row['contenido']);?></td>
<?php

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

	if ($rango=="255" or $rango=="655" or $rango=="755")
	{

?><td><a id="change_status" onclick="javascript:borrar_mp('<?=$row['id_mensaje']?>')" title="Borrar la Denuncia"><img src="http://zincomienzo.net/images/borrar.png" align="absmiddle"></a></td>
<?php
	
}
?>
		
	</tr>





<?php
		}
	}
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