<?php
include("header.php");
$preg = mysql_query("select * from visitass");

while($ja=mysql_fetch_assoc($preg)){
  echo '<center><font face="verdana">Cantidad de visitas: '.$ja['num'].'</font></center>';

  $mas = $ja['num']+1;

  mysql_query("UPDATE visitass
SET num = '{$mas}'");
}

?>