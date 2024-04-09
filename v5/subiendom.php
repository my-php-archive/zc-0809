<?php
include("header.php");
$titulo	= "Pruebas!";
cabecera_normal();
 $id = $_SESSION['id'];
 $titulo = htmlspecialchars(mysql_real_escape_string($_POST['titulo']));
  $url = htmlspecialchars(mysql_real_escape_string($_POST['url']));
   $detalle = htmlspecialchars(mysql_real_escape_string($_POST['detalle']));
    $sqlnick = mysql_fetch_array(mysql_query("SELECT nick FROM usuarios WHERE id='$id'"));
     $nick = $sqlnick['nick'];

?>
 <style type="text/css">
 .avam {
margin: 5px;
border: 1px solid #CCC;
padding: 1px;
height: 100px;
width: 100px;
}
.avam:hover {
border: 1px solid black;
}
 </style>
 <link href="http://www.tscript.in/demo/Temas/default/css/fotos.css" rel="stylesheet" type="text/css" />
<div id="cuerpocontainer">


<!-- inicio cuerpocontainer -->



   <?php if(empty($url) or empty($titulo) or empty($detalle))
   {
     fatal_error('Faltan datos');
   }
   else
   mysql_query("insert into musica (id,titulo,detalle,fecha,hora,nick,url) values (NULL,'$titulo','$detalle',NOW(),NOW(),'$nick','$url')");
      echo'
<div class="container400" style="margin: 10px auto 0 auto;">
	<div class="box_title">
		<div class="box_txt show_error">Exito!</div>
		<div class="box_rrs"><div class="box_rss"></div></div>
	</div>
	<div class="box_cuerpo"  align="center">
		<br />
La cancion se subio correctamente!		<br />
		<br />
		<br />
<input type="button" class="mBtn btnOk" style="font-size:13px" value="Volver a galeria" title="Volver a galeria" onclick="history.go(-1)">			<br />

	</div>


		<br />

		<br />
		<br />
		<br />';
    ?>




</div>











<div style="clear:both">
<!-- fin cuerpocontainer -->


<?php

pie();
?>