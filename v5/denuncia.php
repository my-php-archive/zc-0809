<?php
include("header.php");
$user       =   $_SESSION['user'];
$id_post	=	xss(no_i($_POST['id_post']));
$razon		=	xss(no_i($_POST['razon']));
$cuerpo		=	xss(no_i($_POST['cuerpo']));


$sql = mysql_query("SELECT id_post FROM posts WHERE id_post = '$id_post'");

$sql = "INSERT INTO denuncias (id_post, razon, cuerpo, fecha, autor) ";
$sql.= "VALUES ('$id_post', '$razon', '$cuerpo', NOW(), '$user')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);
$num = $ult_id;

$titulo	=	$descripcion;
cabecera_normal();
if(empty($cuerpo)){
  fatal_error('Escribe una razon en el cuerpo de la denuncia','volver','history.go(-1)');
}
else{
?>
<div id="cuerpocontainer">
<div class="container400" style="margin: 10px auto 0 auto;">
<div class="box_title">
<div class="box_txt show_error">Muchas gracias</div>
<div class="box_rrs"><div class="box_rss"></div></div>
</div><div class="box_cuerpo"  align="center">
<br />La denuncia fue enviada<br /><br /><br />
<input type="button" class="mBtn btnOk" style="font-size:11px" value="Ir a p&aacute;gina principal" title="Ir a p&aacute;gina principal" onclick="location.href='/home.php'">	<input type="button" class="mBtn btnOk" style="font-size:11px" value="Volver" title="Volver" onclick="history.go(-2)">
<br /></div></div><br /><br /><br /><br />
<?php
}
pie();
?>