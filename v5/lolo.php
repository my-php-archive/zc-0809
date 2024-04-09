<?php
include("header.php");

$busqueda = $_GET['busqueda'];
$nombre = $_GET['nombre'];



$sql = "select * from usuarios where id = '{$busqueda}' ";
$preg = mysql_query($sql);
while($row=mysql_fetch_assoc($preg))
{
  echo 'Resultados de la busqueda por nick del usuario '.$busqueda.'  <br>
  '.$row['nick'].' <br>';
}




$sql = "select * from usuarios where id = '{$nombre}' ";
$preg = mysql_query($sql);
while($row=mysql_fetch_assoc($preg))
{
  echo 'Resultados de la busqueda por nick del usuario '.$nombre.'  <br>
  '.$row['nick'].' su Nombre '.$row['nombre'].' <br>';
}






?>