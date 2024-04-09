<?php
include("../header.php");
$user = $_SESSION['user'];
$id_user = $_SESSION['id'];
$sticky = 'on';
$patrocinado = 'on';
$id = no_i($_POST['idpost']);
$termina = no_i($_POST['termina']);

$mod	=	"SELECT * 
			 FROM post 
			 where id='$id'";
$moder	=	mysql_query($mod, $con);
while($moder2 = mysql_fetch_array($moder))
	{
	$stick = $moder2['sticky'];
	$patro = $moder2['patrocinio'];
	}

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
		if ($stick=="on" and $patrocinio=="on")
		{
			echo"   El ID Post <b>'$id'</b> ya esta Patrocinado";
		}
		else{
		$sql = "Update posts Set sticky='on',patrocinado='on' Where id='$id'";
			mysql_query($sql);
			echo"   El ID <b>'$id'</b> se ha Patrocinado Correctamente";
			
		}
	}

}
else{
	echo"   No Tienes Rango Para Esta Seccion";
}
?>

