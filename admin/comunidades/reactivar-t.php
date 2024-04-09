<?php
require_once("../../header.php");

$moderador = $_SESSION['user'];
$id = xss(no_i($_POST['idte']));

$rs = mysql_query("SELECT rango FROM usuarios WHERE nick='$moderador'", $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){

			$sql = "UPDATE c_temas SET elimte='0' WHERE idte='$id'";
            mysql_query($sql);

$rz = mysql_query("SELECT idcomunid FROM c_temas WHERE idte='$id'", $con);
$raw = mysql_fetch_array($rz);

$comu = $raw['idcomuid'];

mysql_query("UPDATE c_comunidades SET numte=numte+'1' WHERE idco='$comu'");
			
echo "1";
}else{
echo "0";
echo '   No Tienes Rango';}
?>