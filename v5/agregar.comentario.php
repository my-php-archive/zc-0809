<?php
include("header.php");
$titulo	= $descripcion;
cabecera_normal();


$usuario		=	xss(no_i($_POST['usuario']));
$nick2		=	xss(no_i($_POST['nick2']));
$avatar		=	xss(no_i($_POST['avatar']));
$fecha		=	xss(no_i($_POST['fecha']));
$detalles		=	xss(no_i($_POST['detalles']));
$nick		=	xss(no_i($_POST['nick']));
$n2 = time();
$key = $_SESSION['id'];





if($key==null){
fatal_error('Para Comentar necesitas autentificarte');
}

if(empty($detalles)){
	fatal_error('El <b>Comentario</b> es requerido para esta operacion','Volver','history.go(-1)');
}


$sql = "INSERT INTO muroperfil (nick2, avatar, fecha, usuario, detalles, nick) ";
$sql.= "VALUES ('$nick2', '$avatar', unix_timestamp(), '$usuario', '$detalles', '$nick')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);
$num = $ult_id;



?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">Se Agrego Correctamente!</div>
		<div class="box_rrs"><div class="box_rss"></div></div>

	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		La Publicaci&oacute;n Se Agrego Correctamente!</b><br />		<br />
		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Volver" title="Volver" onclick="history.go(-1)"> - <input type="button" class="mBtn btnOk" style="font-size:13px" value="Volver a la pagina principal" title="Volver Pagina Principal!" onclick="http://www.zincomienzo.net/">			<br />



	</div></div>	<br />
		<br />
		<br />
		<br />
	<div style="clear:both"></div>



<?php
pie();
?>