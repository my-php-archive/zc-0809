<?php
include("../header.php");
$id = $_SESSION['id'];
$detalle = $_POST['detalle'];
$detalle2 = $_POST['detalle2'];

$sql = "INSERT INTO publicidadb (id,detalle,detalle2) ";
$sql.= "VALUES (null,'$detalle', '$detalle2')";
mysql_query($sql);
$titulo	= $descripcion;

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='$id'"));
$rango = $sqlrango['rango'];

if ($rango=="255" or $rango=="655" or $rango=="755"){

cabecera_normal();


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
		La publicidad se cargo correctamente!<br />		<br />
		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Volver" title="Volver" onclick="location.href='/'">			<br />

		
	</div>
	
</div>	
		<br />
		<br />
		<br />
		<br />
	<div style="clear:both"></div>
<?php
pie();
}
?>