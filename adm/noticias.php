<?php
include("../header.php");
$id = $_SESSION['id'];
$cuerpo = $_POST['comentarios'];
$titulo = $_POST['titulo'];
$sql = "INSERT INTO noticias (id,titulo,detalle,fecha,hora) ";
$sql.= "VALUES (null,'$titulo', '$cuerpo',  NOW(),NOW())";
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
		<div class="box_txt show_error">YEAH!!</div>
		<div class="box_rrs"><div class="box_rss"></div></div>

	</div>
	<div class="box_cuerpo"  align="center">
		<br />
		La noticia se ha publicado correctamente.<br />		<br />
		<br />
		<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ir a p&aacute;gina principal" title="Ir a p&aacute;gina principal" onclick="location.href='/'">			<br />

		
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