<?php
include("../header.php");
$catid = xss(no_i($_POST['catid']));
if(empty($catid)){
	die("Falta la <b>ID</b> de la categoria");
}

$sql = "SELECT * FROM c_subscategorias WHERE id_categoria='{$catid}'";
$sql2 = mysql_query($sql, $con);
echo "{";
while($row=mysql_fetch_array($sql2))
{
$mysql = mysql_num_rows($sql2);
$subc =	'"'.$row['id_subcategoria'].'":"'.$row['nombre_subcategoria'].'"';
$conteo++;
echo $subc;
if($conteo<$mysql){
echo ",";
}
}
echo "}";
?>