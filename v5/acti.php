<?php
include("header.php");
function r($p)
{
  $p = str_replace("+"," ",$p);
  return $p;
}
$hoy = time() - (60*60*24);
$ayer = time() - (60*60*24*2);
$semana = time() - (60*60*24*7);
$mes = time() - (2592000);
$mespas = time() - (5184000);
echo'<h2>Hoy</h2><br>';
$sql = mysql_query("SELECT * FROM acciones WHERE fecha BETWEEN '$hoy' AND unix_timestamp() AND idu = 274 ORDER BY fecha DESC");
while($row = mysql_fetch_assoc($sql))
{
  echo r($row['html'])."<br>";
}
echo'<h2>Ayer</h2><br>';
$sql = mysql_query("SELECT * FROM acciones WHERE fecha BETWEEN '$ayer' AND unix_timestamp() AND idu = 274 ORDER BY fecha DESC");
while($row = mysql_fetch_assoc($sql))
{
  echo r($row['html'])."<br>";
}
?>