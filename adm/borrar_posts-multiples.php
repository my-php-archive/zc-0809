<?php
include('../header.php');

$id = $_SESSION['id'];
$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$id."'"));
$rango = $sqlrango['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755")
{

$titulo	=	$descripcion;
cabecera_normal();
echo'<script src="/admin/acciones.js?5.7" type="text/javascript"></script>
<div id="cuerpocontainer">';
include('menu.php');


?>
		




<div class='boxy xtralarge2'>
			<div class='boxy-title'>
				<h3>Borrador masivo</h3>

				<span class='icon-noti follow-n'></span>
			</div>
			<div class="boxy-content">
			<br />
			
			<div class="emptyData">Con esta herramienta podras borrar automaticamente todos los posts de un usuario</div>
			
			<br />
			
			<center><h4>Esta opci&oacute;n no es un jueguete por ende no abuses</h4></center>
<br>
			<center><li><b>Escribe el nick del usuario al cual le quieres eliminar todos los posts</b></li></center>
			
			<form action="borrar_posts-multiples.php" method="get">
			  <center><input class="text-inp required" type="text" name="n" maxlength="60" tabindex="1" style="width: 410px"></center>
			  <br>
			  
			  <script type="text/javascript">function irAlIndice() {confirm("¿estas seguro, este es un punto de no retorno?")}</script>
			  
			  <center><input title="Eliminar posts" value="Eliminar posts" class="mBtn btnDelete" type="submit" onclick = "return confirm('Seguro que deseas eliminar todos los posts?');"></center>
			</form><hr />
			 <?php
			 
			 $nick = $_GET['n'];
if(isset($nick)){
   $Existe = mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE nick = '$nick'"));
    if(!$Existe){
	  echo'<div class="emptyData">No existe un usuario con ese nick</div>';
	}//
	else{
	 $Exis = mysql_query("SELECT * FROM usuarios WHERE nick = '$nick'");
	 $roc = mysql_fetch_assoc($Exis);
	 $idaa = $roc['id'];
	  mysql_query("UPDATE posts SET elim = 1 WHERE id_autor = '$idaa'") or die(mysql_error());
	  	  mysql_query("UPDATE usuarios SET numposts = 0 WHERE id = '$idaa'") or die(mysql_error());

	  	  echo'<div class="warningData">Se han eliminado todos los posts</div>';

	}
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
</div>
<div style="clear:both"></div>
<?php
}
pie();
?>