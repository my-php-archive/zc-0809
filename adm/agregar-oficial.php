<?php
include("../header.php");
$user = $_SESSION['user'];
$id_user = $_SESSION['id'];
$sticky = '1';
$id = $_POST['idpost'];
$termina = $_POST['termina'];

$sql = "SELECT rango ";
$sql.= "FROM usuarios where id='$id_user' ";
$rs = mysql_query($sql, $con);
while($row = mysql_fetch_array($rs))
	{
	$rango = $row['rango'];
	}
if ($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755")
{
	if (trim($id)!="")
	{
		$sql2 = "SELECT oficial ";
		$sql2.= "FROM c_comunidad where idco='$id'";
		$rs2 = mysql_query($sql2,$con);
		if (!mysql_num_rows($rs2)>0)
		{
			$sql = "SELECT orden ";
			$sql.= "FROM stickies order by orden desc limit 0,1 ";
			$rs = mysql_query($sql, $con);
			while($row = mysql_fetch_array($rs))
			{
				$ult_orden = $row['orden'];
			}
			
			$orden = $ult_orden + 1;
			$sql = "Update c_comunidades Set oficial='$sticky' Where shortname='$id'";
			mysql_query($sql);
echo"   El ID <b>{$id}</b> se ha convertido en una comunidad oficial.";
		}
		else{
			echo"   El ID <b>{$id}</b> ya es una comunidad Oficial.";
		}
	}

}
else{
	echo"   No tienes rango para esta seccion";
}
?>

