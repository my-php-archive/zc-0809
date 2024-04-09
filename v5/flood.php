<?php
include("header.php");
$tiempo = time();

$minuto = time() - (2*606);
$sql = mysql_query("SELECT * FROM usuarios WHERE ultimaaccion2 BETWEEN '$minuto' AND unix_timestamp() AND id = 274");
$nun = mysql_num_rows($sql);
//mysql_query("UPDATE usuarios SET ultimaaccion = '$tiempo' WHERE id = 274");
if($nun==1)
{
  echo"No puedes realizar tantas acciones en tan poco tiempo :D";
}
else
{
  echo"Ok :D";
}
?>