<?php
/*   # u.automatic_rank.php
* Desarrrollado por timbalentimba para www.zincomienzo.net
*  Contacto: timbalentimba@hotmail.com
*     Puto el que lee
*/

  include("../header.php");
    $UAuto = mysql_query("SELECT * FROM usuarios WHERE numposts >= '3' AND rango = '11'") or die(mysql_error());
	 while($row = mysql_fetch_assoc($UAuto)){
	    $Id = $row['id'];
		  $Cambiar = mysql_query("UPDATE usuarios SET rango = '12' WHERE id = '$Id'") or die(mysql_error());
	 }
?>