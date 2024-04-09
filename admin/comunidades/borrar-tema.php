<?php
require_once("../../header.php");

$moderador = $_SESSION['user'];
$idmod = $_SESSION['id'];
$idte = (int) xss(no_i($_POST['idte']));
$razon = xss(no_i($_POST['razon']));

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$idmod."'"));

$rango = $sqlrango['rango'];

if ($rango=="255" or $rango=="100" or $rango=="655" or $rango=="755"){

$pist = mysql_query("SELECT id_autor, titulo, idcomunid FROM c_temas WHERE idte='$idte'",$con);
$rast = mysql_fetch_array($pist);

$titulo = $rast['titulo'];
$comunidad = $rast['idcomunid'];
$autorsito = $rast['id_autor'];

$sql = "SELECT idco, nombre FROM c_comunidades WHERE idco='{$comunidad}'";
$rs = mysql_query($sql);
$comu = mysql_fetch_array($rs);

/*Borrada*/
$para2 = $autorsito;
$asunto2 = 'Tema eliminado: '.$titulo.'';
$contenido2 = '
Lamento contarte que tu tema titulado [b]'.$titulo.'[/b] ha sido eliminado de la comunidad [b]'.$comu['nombre'].'[/b] 

Causa: [b]'.$razon.'[/b]

Por favor, la proxima vez que cree una comunidad lea antentamente el [b][url='.$url.'/protocolo]Protocolo de Comunidades[/url][/b].

Muchas gracias por entender!';

$id_user2 = $_SESSION['id'];

	$sqltems = mysql_query("SELECT idte from c_temas where idte='".$idte."'");
    if(mysql_num_rows($sqltems)>0)
    {
        $sqlthem = mysql_query("SELECT elimte FROM c_temas WHERE idte='".$idte."'");
		$rats = mysql_fetch_array($sqlthem);
		if($rats['elimte']=='0')
		{

		$sql = "INSERT INTO mensajes (id_emisor, id_receptor, asunto, contenido, fecha) ";
		$sql.= "VALUES ('$id_user2', '$para2', '$asunto2', '$contenido2', NOW())";
		$rs = mysql_query($sql);
			
            $s2l = "UPDATE c_comunidades SET numte=numte-'1' WHERE idco='$autorsito'";
            mysql_query($s2l);
			
            $sql = "UPDATE c_temas SET elimte='1' WHERE idte='$idte'";
            mysql_query($sql);

echo '   El Tema  <b>'.$titulo.'</b> Ha Sido Eliminado';
}
else{
	echo '   El Tema <b>'.$idte.'</b> Ya se Encuentra Eliminado';
}
}
else{
	echo '   El Tema <b>'.$idte.'</b> No Existe';
}
}
else{
	echo '   No Tienes Rango';
}
?>