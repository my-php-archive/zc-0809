<?php
include('../header.php');

$titulo		=	xss(no_i($_POST['titulo']));
$nick		=	xss(no_i($_POST['nick']));
$ultimaip   =	xss(no_i($_POST['ultimaip']));
$avatar	=	xss(no_i($_POST['avatar']));
$horario	=	xss(no_i($_POST['horario']));
$cuerpo		=	xss(no_i($_POST['cuerpo']));

$sql = "INSERT INTO notas (titulo, nick, ultimaip, avatar, horario, cuerpo, fecha) ";
$sql.= "VALUES ('$titulo','$nick','$ultimaip', '$avatar', '$horario', '$cuerpo', NOW())";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);
$num = $ult_id;
cabecera_normal();
$id_user = $_SESSION['id'];
?>

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">YEAH!</div>
		<div class="box_rrs"><div class="box_rss"></div></div>

	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		La nota se ha publicado exitosamente<br />		<br />
		<br />
		<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ver Nota" title="Ver Nota" onclick="location.href='/adm/notas'">			<br />

		
	</div>
	
</div>	
		<br />
		<br />
		<br />
		<br />
	<div style="clear:both"></div>




<?php
pie();
?>