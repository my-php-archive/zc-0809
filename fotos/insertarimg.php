<?php
include("../header.php");
$titulo	= "Foto Publicada!";
cabecera_normal();
 $id = $_SESSION['id'];
 $titulo = mysql_real_escape_string($_POST['titulo']);
  $foto = mysql_real_escape_string($_POST['foto']);
   $contenido = mysql_real_escape_string($_POST['contenido']);

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




   <?php if(empty($foto) or empty($titulo) or empty($contenido))
   {
     fatal_error('Faltan datos');
   }
   else
   mysql_query("insert into fotos (id,titulo,contenido,fecha,hora,nick,foto) values (NULL,'$titulo','$contenido',NOW(),NOW(),'$nick','$foto')");
  
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
		La Foto Se Agrego Correctamente!		<br />
		<br />
		<br />
	<input type="button" class="mBtn btnOk" style="font-size:13px" value="Ver Publicaci&oacute;n" title="Ver Publicaci&oacute;n" onclick="location.href='/fotos/'">			<br />

		
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