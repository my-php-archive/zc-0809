<?php
include("../header.php");
$titulo	= $descripcion;
cabecera_normal();
if($rangoz['rango'] =="255" or $rangoz['rango'] =="100" or $rangoz['rango'] =="655" or $rangoz['rango'] =="755"){
$usuario		=	xss(no_i($_POST['usuario']));
$medalla		=	xss(no_i($_POST['medalla']));
$causa		=	xss(no_i($_POST['causa']));
$fecha		=	xss(no_i($_POST['fecha']));
$detalles		=	xss(no_i($_POST['detalles']));

$sql = "INSERT INTO medallas (medalla, causa, fecha, usuario, detalles) ";
$sql.= "VALUES ('$medalla', '$causa', unix_timestamp(), '$usuario', '$detalles')";
$rs = mysql_query($sql, $con) or die("Error al grabar un mensaje: ".mysql_error);
$ult_id = mysql_insert_id($con);
$num = $ult_id;
?>
<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">Bien!</div>
		<div class="box_rrs"><div class="box_rss"></div></div>

	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		<b>La Medalla Se Entrego Correctamente!</b><br /><br />

	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ir Pagina Principal!" title="Ir Pagina Principal!" onclick="location.href='/'">			<br />

		
	</div>
	
</div>	
		<br />
		<br />
		<br />
		<br />
	<div style="clear:both"></div>
<?php
pie();}else{
$pagina = "zincomienzo.net/404.php";
echo file_get_contents($pagina);
}
?>