<?php
require_once("../header.php");

$moderador = $_SESSION['user'];
$idmod = $_SESSION['id'];
$idpost = $_POST['idpost'];
$razon = $_POST['razon'];

/*Borrada*/
$para2      = $_POST['acus'];
$asunto2  = 'Post eliminado: '.$postitulo.'';
$contenido2 = 'Hola!

Lamento contarte que tu post titulado [b]'.$postitulo.'[/b] ha sido eliminado.

Causa: [b]'.$razon.'[/b]

Para acceder al [b][url=http://zincomienzo.net/protocolo]protocolo[/url][/b], presiona este [b][url=http://zincomienzo.net/protocolo]enlace[/url][/b].

Muchas gracias por entender!';
$id_user2   = $_SESSION['id'];

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$idmod."'"));
$user = $sqlrango['rango'];

$sqlrango = mysql_fetch_array(mysql_query("SELECT rango FROM usuarios WHERE id='".$idmod."'"));
$rango = $sqlrango['rango'];

if ($rango=="100" or $rango=="255" or $rango=="655" or $rango=="755")
{
	$sqlposts = mysql_query("select id from posts where id='".$idpost."'");
    if (mysql_num_rows($sqlposts)>0)
    {
        $sqlpostse = mysql_query("select id_post, accion from posts_eliminados where id_post='".$idpost."' and accion='1' ");
		if (!mysql_num_rows($sqlpostse)>0)
		{
		
			$sql = "select id from usuarios where nick='".$para2."'";
	$rs2 = mysql_query($sql);
	if (mysql_num_rows($rs2)>0)
	{
		$row2 = mysql_fetch_array($rs2);
		$para_id2 = $row2['id'];
		$sql = "INSERT INTO mensajes (id_emisor, id_receptor, asunto, contenido, fecha) ";
		$sql.= "VALUES ('$id_user2', '$para_id2', '$asunto2', '$contenido2', NOW())";
		$rs = mysql_query($sql) or die("Error al enviar el mensaje");
		}
		
			$sql = "INSERT INTO posts_eliminados (id_modera,id_post,causa,fecha,accion)";
            $sql.= "VALUES ('$idmod','$idpost','$razon',NOW(),'1')";
            mysql_query($sql);

            $sql = "Update posts set elim='1' where id='$idpost'";
            mysql_query($sql);
			
			//seleccionamos post
$sql = "SELECT * FROM posts WHERE id=".$idpost."";
$rs = mysql_query($sql, $con);
$row = mysql_fetch_array($rs);
$titulo = $row['titulo'];
$categoria = $row['categoria'];
$usuario = $row['id_autor'];
		
			$sql = "Update usuarios set numposts=numposts-'1' where id='$usuario'";
            mysql_query($sql);

$db->query("INSERT INTO borradores (estatus, borrador, id_autor, titulo, contenido, fecha2, tipo, categoria, causa) VALUES (0, 1, '$usuario', '$titulo', $idpost, unix_timestamp(), 'eliminados', '$categoria', '$razon')");
            
            $sqltitulo = mysql_fetch_array(mysql_query("SELECT titulo FROM posts WHERE id='".$idpost."'"));
            $postitulo = $sqltitulo['titulo'];
echo '   El Post  <b>'.$postitulo.'</b> Ha Sido Borrado';
}
else{
	echo '   El ID POST <b>'.$idpost.'</b> ya se encuentra eliminado';
}
}
else{
	echo '   El ID POST <b>'.$idpost.'</b> no existe';
}
}
else{
	echo '   No tienes rango';
}
?>