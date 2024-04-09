<?php
include("../header.php");

$titulo = "La Foto Fue Borrada Exitosamente! ";

cabecera_normal();

$id = $_SESSION['id'];

$ida=$_GET["id"];

if($rangoz['rango']==255 or $rangoz['rango']==755 or $rangoz['rango']==655 or $rangoz['rango']==100){
$result=mysql_query("DELETE FROM imagenes WHERE ida = '$ida'");
}else{
}



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
		La Foto Fue Borrada Exitosamente!		<br />
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