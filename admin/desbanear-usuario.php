<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$usuario = xss(no_i($_POST['usuario']));

$sql = "SELECT rango ";
$sql.= "FROM usuarios where nick='$moderador' ";
$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
	{
	$rango = $row['rango'];
	}
if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755")
{
	$sql3 = "select * from usuarios where nick='$usuario' ";
    $rs3 = mysql_query($sql3,$con);
    if (mysql_num_rows($rs3)>0)
    {
        $sql2 = "select * from suspendidos where nick='$usuario' and activo='0' ";
		$rs2 = mysql_query($sql2,$con);
		if (!mysql_num_rows($rs2)>0)
		{
			$sql = "Update usuarios set ban='0' where nick='$usuario'";
			mysql_query($sql);
			
			$sql = "DELETE FROM suspendidos WHERE nick='$usuario'";
            mysql_query($sql);
            
echo "1";
}
else{
	echo '0';
	echo '   El Usuario '.$nombre.' NO esta Desuspendido/Desbaneado2';
}
}
else{
	echo '0';
	echo '   El Usuario '.$nombre.' NO esta Suspendido/Baneado';
}
}
else{
	echo '0';
	echo '   No Tienes Rango';
}
?>