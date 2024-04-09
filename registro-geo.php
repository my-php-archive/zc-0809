<?php
require_once("header.php");
$type = htmlspecialchars($_GET['type'], ENT_QUOTES);
$pais_code = htmlspecialchars($_GET['pais_code'], ENT_QUOTES);

$masql = "SELECT * FROM paises WHERE img_pais='".$pais_code."'";
$resultant = mysql_query($masql,$con);
$rowis = mysql_fetch_array($resultant);
$idpais = $rowis['id_pais'];

$misql = "SELECT * FROM estados WHERE relacion='".$idpais."'";
$resultan = mysql_query($misql,$con);
$rowi = mysql_fetch_row($resultan);


if($type='provincias'){
echo '1:';
   do {
     echo '<option value="'.$rowi['0'].'">'.$rowi['1'].'</option>'; 
} while ($rowi = mysql_fetch_row($resultan));

exit();
}
if($type='check'){
	die('1: check');
}
if($type='hay_ciudades'){
	die('1: hay_ciudades');
}
?>