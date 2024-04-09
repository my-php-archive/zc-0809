<?php
include("header.php");
$titulo	= "Pruebas!";
cabecera_normal();

 $id = $_SESSION['id'];


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


<center><form action="insertarimg.php" method="post">
<h3>T&iacute;tulo</h3><br />
 <input name="titulo" type="text"  size="100" maxlength="200" /><br />
 <h3>Url</h3><br />
 <input name="url" type="text"  size="100" maxlength="200" /><br />
 <h3>Detalle</h3>
 <textarea name="detalle" cols="72" rows="20" size="100">

  </textarea><br />
   <input type="submit" name="button"  value="Enviar" />
 <hr />


</form> </center>




</div>











<div style="clear:both">
<!-- fin cuerpocontainer -->


<?php

pie();
?>