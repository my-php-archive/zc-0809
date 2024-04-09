<?php
require_once("../../header.php");

$moderador = $_SESSION['user'];
$id = xss(no_i($_POST['idc']));

$sql = "SELECT rango ";
$sql.= "FROM usuarios where nick='$moderador' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755")
{
			$sql = "DELETE FROM c_denuncias WHERE id='$id'";
            mysql_query($sql);
            
echo "1";
}else{
echo '0';
echo '   No Tienes Rango';}
?>