<?php
require_once("../../header.php");

$idmod = $_SESSION['id'];
$shortname = xss(no_i($_POST['shortname']));

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$idmod."'"));

$rango = $sqlrango['rango'];

if ($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755"){

$rs = mysql_query("SELECT nombre, shortname FROM c_comunidades WHERE shortname='$shortname'");
$comu = mysql_fetch_array($rs);

	$sqltems = mysql_query("SELECT idco from c_comunidades WHERE shortname='$shortname'");
    if(mysql_num_rows($sqltems)>0)
    {
        $sqlthem = mysql_query("SELECT eliminado FROM c_comunidades WHERE shortname='$shortname'");
		$rats = mysql_fetch_array($sqlthem);
		if($rats['eliminado']=='0')
		{

            $sql = "UPDATE c_comunidades SET eliminado='1' WHERE shortname='$shortname'";
            mysql_query($sql);

echo '   La Comunidad  <b>'.$comu['nombre'].'</b> Ha Sido Eliminada';
}
else{
	echo '   La Comunidad <b>'.$shortname.'</b> Ya se Encuentra Eliminada';
}
}
else{
	echo '   La Comunidad <b>'.$shortname.'</b> No Existe';
}
}
else{
	echo '   No Tienes Rango';
}
?>