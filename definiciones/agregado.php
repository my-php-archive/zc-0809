<?php
include("../header.php");

$titulo		=	xss(no_i($_POST['titulo']));
$nick		=	xss(no_i($_POST['nick']));
$ultimaip   =	xss(no_i($_POST['ultimaip']));
$avatar	=	xss(no_i($_POST['avatar']));
$horario	=	xss(no_i($_POST['horario']));
$cuerpo		=	xss(no_injection($_POST['cuerpo']));

$sql = "INSERT INTO definiciones (titulo, nick, ultimaip, avatar, horario, cuerpo, fecha) ";
$sql.= "VALUES ('$titulo','$nick','$ultimaip', '$avatar', '$horario', '$cuerpo', NOW())";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);
$num = $ult_id;
cabecera_normal();
$id_user = $_SESSION['id'];

if(empty($id_user)){
fatal_error('No puedes agregar Definici&oacute;nes si no estas auntentificado.','Ir a p&aacute;gina principal','location.href=\'/\'','Error!');}

?>

<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">Exito!!</div>
		<div class="box_rrs"><div class="box_rss"></div></div>

	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		La Definici&oacute;n ha sido agregada.<br />		<br />
		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ver Publicaci&oacute;n" title="Ver Publicaci&oacute;n" onclick="location.href='/definiciones/'">			<br />

		
	</div>
	
</div>	
		<br />
		<br />
		<br />
		<br />
	<div style="clear:both"></div>


<?php
mysql_query("insert into acciones (ida,idu,tipo,html,fecha,otro) values (NULL,'{$key}','definicion-n',' Agreg&oacute; una Definici&oacute;n <a href=\"/definiciones\" >$titulo</a>',unix_timestamp(),'')");
?>


<?php
pie();
?>