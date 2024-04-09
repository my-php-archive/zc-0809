<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$id = xss(no_i($_POST['id']));

$sql = "SELECT rango ";
$sql.= "FROM usuarios where nick='$moderador' ";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);

$rango = $row['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755"){

			$sql = "UPDATE posts SET elim='0' WHERE id='$id'";
            mysql_query($sql);
        
			$stl = "DELETE FROM posts_eliminados WHERE id_post='$id'";
            mysql_query($stl);		

$sal = "SELECT id_autor FROM posts WHERE id='$id' ";
$rz = mysql_query($sal, $con);
$raw = mysql_fetch_array($rz);

$autor = $raw['id_autor'];

			$sbl = "UPDATE usuarios SET numposts=numposts+'1' WHERE id='$autor'";
            mysql_query($sbl);
			
echo "1";}
else{
echo "0";
echo '   No tienes rango';
}
?>