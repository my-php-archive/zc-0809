<?php
include("../header.php");
cabecera_normal();

$id = $_SESSION['id'];

$id_comentario=$_GET["id_comentario"];

$result=mysql_query("DELETE FROM comentariosimg WHERE id_comentario = '$id_comentario'");



?>


<div id="cuerpocontainer">
<!-- inicio cuerpocontainer -->
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">YEAH</div>
		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>

	<div class="box_cuerpo"  align="center">
		<br />
		El Comentario Se Elimino Correctamente!		<br />
		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Volver" title="Volver" onclick="history.go(-1)">			<br />

		
	</div>
	
</div>	
		<br />
		<br />
		<br />
		<br />
	<div style="clear:both"></div>
<!-- fin cuerpocontainer -->

<?php
pie();

?>