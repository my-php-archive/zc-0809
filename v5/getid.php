<?php
include("header.php");
/*
    ______________________________
   | Fix creado por timbalentimba |
   | Timbalentimba@hotmail.com    |
   | 20 De abril de 2011 :D       |
    ______________________________

Detalles: obtiene la id de algun usuario de la base de datos
A partir de un valor ingresado o $string

*/
function getId($string)
{
  /****************************************/
  $sql = mysql_query("select * from usuarios where nick = '{$string}'") or die(mysql_error());
  $row = mysql_fetch_assoc($sql);
  /****************************************/
  return $row['id'];
}

function getDefault($string,$def)
{
   if(!$string){return $def;}else{return $string;}
}
 $xd = getDefault($_GET['n'],"Timbalentimba");
 echo getId($xd);

?>