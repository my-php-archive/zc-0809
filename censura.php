<?php
include("header.php");
 cabecera_normal();
if($rangoz['rango']=="255" or $rangoz['rango']=="100" or $rangoz['rango']=="655" or $rangoz['rango']=="755")
{

 echo'<div id="cuerpocontainer">
 <h1><center><b>Censurador de palabras</b></center></h1>
<form action="censurando.php" method="post">
<center><input type="text" name="palabra" value="Palabra a censurar" /><br /></center>
<center><input type="text" name="censura" value="Censura" /></center>
<hr />
<center><input type="submit" value="Aceptar" /></center>
<hr />
</form>';

}
else
{
  include("404.php");
}
pie(); 
?>