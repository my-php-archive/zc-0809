<?php
include("header.php");
 cabecera_normal();
if($rangoz['rango']=="255" or $rangoz['rango']=="100" or $rangoz['rango']=="655" or $rangoz['rango']=="755")
{

 echo'<div id="cuerpocontainer">
 <h1>Censura de palabras by zincomienzo Beta 1.0.-</h1>
<form action="censurando.php" method="post">
<input type="text" name="palabra" value="palabra a censurar" /><br />
 <input type="text" name="censura" value="censura" />
<hr />
<input type="submit" value="Enviar" />
</form>';

}
else
{
  include("404.php");
}
pie(); 
?>